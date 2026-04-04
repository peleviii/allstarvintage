#!/bin/bash
set -e

DOMAIN="allstarvintage.gr"
EMAIL="info@allstarvintage.gr"

echo "🏐 All Star Vintage Tournament - Deploy Script"
echo "=============================================="

# Check docker
if ! command -v docker &> /dev/null; then
    echo "❌ Docker not found. Installing..."
    curl -fsSL https://get.docker.com | sh
    systemctl enable docker
    systemctl start docker
fi

if ! command -v docker compose &> /dev/null; then
    echo "❌ Docker Compose not found. Installing..."
    apt-get install -y docker-compose-plugin
fi

echo "✅ Docker ready"

# Build & start
echo "🔨 Building container..."
docker compose up -d --build

echo "✅ Site is running on http://localhost"
echo ""

# SSL setup
read -p "🔒 Setup SSL for $DOMAIN? (y/n): " ssl_choice

if [ "$ssl_choice" == "y" ]; then
    echo "📦 Installing certbot..."
    apt-get update && apt-get install -y certbot

    echo "⏸️  Stopping nginx temporarily for certbot..."
    docker compose stop

    echo "🔐 Getting SSL certificate..."
    certbot certonly --standalone \
        -d "$DOMAIN" \
        -d "www.$DOMAIN" \
        --email "$EMAIL" \
        --agree-tos \
        --non-interactive

    echo "🔄 Switching to SSL nginx config..."
    cp nginx-ssl.conf nginx.conf

    # Update compose to mount SSL certs
    sed -i 's|# - /etc/letsencrypt|- /etc/letsencrypt|g' docker-compose.yml
    sed -i 's|# - ./nginx-ssl|- ./nginx-ssl|g' docker-compose.yml

    docker compose up -d --build

    echo "✅ SSL enabled! Site running at https://$DOMAIN"

    # Auto-renew cron
    (crontab -l 2>/dev/null; echo "0 3 * * * certbot renew --quiet && docker compose -f $(pwd)/docker-compose.yml restart") | crontab -
    echo "✅ SSL auto-renewal scheduled"
else
    echo "✅ Site running at http://$DOMAIN (no SSL)"
fi

echo ""
echo "🏐 Deployment complete!"
echo "   URL: https://$DOMAIN"
echo ""
echo "📋 Useful commands:"
echo "   docker compose ps          → status"
echo "   docker compose logs -f     → logs"
echo "   docker compose restart     → restart"
echo "   docker compose down        → stop"
