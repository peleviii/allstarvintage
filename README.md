# 🏐 Markopoulo Volleyball All Star Vintage Tournament
## allstarvintage.gr — Docker Setup

---

## 📁 Αρχεία

```
allstarvintage/
├── index.html        ← Το site
├── Dockerfile        ← Docker image (nginx:alpine)
├── docker-compose.yml
├── nginx.conf        ← HTTP config
├── nginx-ssl.conf    ← HTTPS config (για production)
├── deploy.sh         ← Αυτόματο deploy script
└── README.md
```

---

## 🚀 Γρήγορη Εκκίνηση (Τοπικά)

```bash
cd allstarvintage
docker compose up -d --build
```

Άνοιξε το http://localhost

---

## 🌐 Deploy σε Server (Production)

### 1. Ανέβασε τα αρχεία στον server
```bash
scp -r allstarvintage/ user@YOUR_SERVER_IP:/opt/allstarvintage
ssh user@YOUR_SERVER_IP
cd /opt/allstarvintage
```

### 2. Τρέξε το deploy script (κάνει όλα αυτόματα)
```bash
chmod +x deploy.sh
sudo ./deploy.sh
```

Το script:
- Εγκαθιστά Docker αν δεν υπάρχει
- Χτίζει και ξεκινά το container
- Προαιρετικά: Παίρνει SSL certificate (Let's Encrypt, δωρεάν)
- Ρυθμίζει auto-renewal για το SSL

---

## 🔒 SSL Χειροκίνητα

```bash
# Σταμάτα το container
docker compose stop

# Πάρε certificate
certbot certonly --standalone -d allstarvintage.gr -d www.allstarvintage.gr \
  --email info@allstarvintage.gr --agree-tos --non-interactive

# Χρησιμοποίησε SSL config
cp nginx-ssl.conf nginx.conf

# Ξεκίνα ξανά
docker compose up -d --build
```

---

## 📋 Χρήσιμες Εντολές

```bash
docker compose ps           # Κατάσταση
docker compose logs -f      # Live logs
docker compose restart      # Επανεκκίνηση
docker compose down         # Σταμάτημα
docker compose up -d        # Εκκίνηση
```

---

## 🔄 Ενημέρωση Site

Αλλαγές στο `index.html` → Επανεκκίνηση:
```bash
docker compose restart
# ή αν άλλαξε το Dockerfile:
docker compose up -d --build
```

---

## 🖥️ Απαιτήσεις Server

- Ubuntu 20.04+ / Debian 11+
- 1GB RAM (αρκεί)
- Port 80 & 443 ανοιχτά
- Domain `allstarvintage.gr` → IP του server (DNS A record)

---

*Markopoulo Volleyball All Star Vintage Tournament © 2025*
