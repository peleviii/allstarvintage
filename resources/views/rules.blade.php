@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-medium text-[#1a3a6b] mb-2">Κανόνες Τουρνουά</h1>
    <p class="text-sm text-gray-500 mb-8">All Star Vintage Tournament — Μαρκόπουλο, 5-7 Ιουνίου 2026</p>

    <div class="space-y-6">
        <!-- Τοποθεσία -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h2 class="font-medium text-[#1a3a6b] text-base mb-3 pb-2 border-b border-[#d4a017]">Άρθρο 1 — 📍 Τοποθεσία Διεξαγωγής</h2>
            <div class="text-sm text-gray-700 space-y-3">
                <p>Μαρκόπουλο Αττικής — 5, 6 & 7 Ιουνίου 2026</p>
                <a href="https://maps.app.goo.gl/w6i6czuWPJ2rpHUCA"
                    target="_blank"
                    class="inline-flex items-center gap-2 bg-[#1a3a6b] text-white px-4 py-2 rounded-lg text-sm hover:bg-[#2563eb] transition">
                    📍 Άνοιξε στο Google Maps
                </a>
            </div>
        </div>
        <!-- Άρθρο 1 -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h2 class="font-medium text-[#1a3a6b] text-base mb-3 pb-2 border-b border-[#d4a017]">Άρθρο 2 — Δικαίωμα Συμμετοχής</h2>
            <p class="text-sm text-gray-700 leading-relaxed">Δικαίωμα συμμετοχής έχουν όλοι όσοι αγαπούν το βόλεϊ! Σωματεία, παρέες, εταιρείες, δήμοι — όλοι ευπρόσδεκτοι με μία ή περισσότερες ομάδες. Οι ομάδες είναι μεικτές με υποχρεωτική σύνθεση <strong>3 άνδρες και 3 γυναίκες</strong> στον αγωνιστικό χώρο.</p>
            <p class="text-sm text-gray-700 leading-relaxed mt-2">Δηλώσεις συμμετοχής έως <strong>25 Μαΐου 2026</strong>.</p>
            <p class="text-sm text-gray-700 leading-relaxed mt-2">Η κλήρωση θα πραγματοποιηθεί τη <strong>Δευτέρα 1 Ιουνίου 2026 στις 12:00</strong>. Οι αγώνες θα διεξαχθούν το τριήμερο <strong>5, 6 και 7 Ιουνίου 2026</strong> στο Μαρκόπουλο Αττικής.</p>
            <p class="text-sm text-[#1a3a6b] font-medium mt-3">✅ Κόστος συμμετοχής: Δωρεάν</p>
        </div>

        <!-- Άρθρο 3 -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h2 class="font-medium text-[#1a3a6b] text-base mb-3 pb-2 border-b border-[#d4a017]">Άρθρο 3 — Δικαίωμα Συμμετοχής Αθλητών/Αθλητριών</h2>
            <div class="text-sm text-gray-700 leading-relaxed space-y-2">
                <p>Μπορούν να αγωνίζονται αθλητές και αθλήτριες γεννημένοι/ες <strong>από το έτος 1996 και μεγαλύτεροι/ες</strong>, με την προϋπόθεση να μην είναι ενεργοί αθλητές/τριες.</p>
                <p>Δεν επιτρέπεται συμμετοχή αθλητή/τριας που κατά τις περιόδους 2023-24 και 2024-25 αγωνίστηκε σε πρωτάθλημα <strong>Α1, Α2 Εθνικής κατηγορίας ή Pre League</strong> Ανδρών και Γυναικών.</p>
                <div class="bg-blue-50 rounded-lg p-3 mt-2">
                    <p class="text-xs text-blue-800 font-medium mb-1">Διευκρινίσεις:</p>
                    <p class="text-xs text-blue-700">• Για γεννηθέντες/είσες το <strong>1979 και πριν</strong>: ελεύθερη συμμετοχή, δεν ισχύει κανένας περιορισμός.</p>
                    <p class="text-xs text-blue-700 mt-1">• Για γεννηθέντες/είσες <strong>1980 έως 1984</strong>: ισχύει ο περιορισμός μόνο για την αγωνιστική περίοδο 2024-2025.</p>
                    <p class="text-xs text-blue-700 mt-1">• Κατ' εξαίρεση επιτρέπεται συμμετοχή αθλητή/τριας γεννημένου/ης το <strong>1997 ή 1998</strong> αρκεί να υπάρχει μόνο ένας στην εξάδα.</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-6">
    <h2 class="font-medium text-[#1a3a6b] text-base mb-3 pb-2 border-b border-[#d4a017]">Άρθρο 4 — Διαιτησία & Συμπεριφορά</h2>
    <div class="text-sm text-gray-700 leading-relaxed space-y-2">
        <p>Οι αγώνες του τουρνουά θα διεξαχθούν με <strong>επίσημους διαιτητές</strong> από τα εθνικά πρωταθλήματα βόλεϊ.</p>
        <p>Οι αποφάσεις των διαιτητών είναι <strong>τελεσίδικες και αμετάκλητες</strong>. Παράπονα εντός ή εκτός γηπέδου δεν γίνονται αποδεκτά.</p>
        <div class="bg-blue-50 rounded-lg p-3 mt-2">
            <p class="text-xs text-blue-800 font-medium mb-1">Υποχρεώσεις αθλητών & ομάδων:</p>
            <p class="text-xs text-blue-700">• Υποχρεωτική χρήση <strong>φανελών με αριθμούς</strong> για την ορθή εφαρμογή των κανονισμών.</p>
            <p class="text-xs text-blue-700 mt-1">• Απαγορεύεται κάθε μορφή <strong>αντιαθλητικής συμπεριφοράς</strong> απέναντι στους διαιτητές, αντιπάλους και θεατές.</p>
            <p class="text-xs text-blue-700 mt-1">• Η οργανωτική επιτροπή διατηρεί το δικαίωμα <strong>αποκλεισμού αθλητή ή ομάδας</strong> σε περίπτωση παραβίασης των κανόνων συμπεριφοράς.</p>
        </div>
    </div>
</div>
        <!-- Άρθρο 6 -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h2 class="font-medium text-[#1a3a6b] text-base mb-3 pb-2 border-b border-[#d4a017]">Άρθρο 5 — Βαθμολογία</h2>
            <p class="text-sm text-gray-700 mb-3">Ως προσέλευση θεωρείται η παρουσία στο γήπεδο τουλάχιστον <strong>6 αθλητών/τριών</strong> με αθλητική περιβολή.</p>
            <div class="space-y-2">
                <div class="flex items-center gap-3 bg-green-50 rounded-lg px-4 py-2">
                    <span class="text-green-700 font-bold text-sm w-16">2 - 0</span>
                    <span class="text-green-700 text-sm">Νικητής <strong>+3 βαθμοί</strong> / Ηττημένος <strong>0 βαθμοί</strong></span>
                </div>
                <div class="flex items-center gap-3 bg-blue-50 rounded-lg px-4 py-2">
                    <span class="text-blue-700 font-bold text-sm w-16">2 - 1</span>
                    <span class="text-blue-700 text-sm">Νικητής <strong>+2 βαθμοί</strong> / Ηττημένος <strong>+1 βαθμός</strong></span>
                </div>
                <div class="flex items-center gap-3 bg-red-50 rounded-lg px-4 py-2">
                    <span class="text-red-700 font-bold text-sm w-16">0 - 2</span>
                    <span class="text-red-700 text-sm">Ηττημένος <strong>0 βαθμοί</strong></span>
                </div>
            </div>
            <div class="mt-4 text-sm text-gray-700 space-y-1">
                <p class="font-medium text-[#1a3a6b]">Σε περίπτωση ισοβαθμίας λαμβάνονται υπόψη κατά σειρά:</p>
                <p>1. Αριθμός νικών</p>
                <p>2. Λόγος κερδισμένων / χαμένων sets</p>
                <p>3. Αποτελέσματα μεταξύ των ισόβαθμων ομάδων</p>
            </div>
        </div>

        <!-- Άρθρο 13 -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h2 class="font-medium text-[#1a3a6b] text-base mb-3 pb-2 border-b border-[#d4a017]">Άρθρο 6 — Έπαθλα</h2>
            <p class="text-sm text-gray-700 leading-relaxed">Στις <strong>τρεις πρώτες θέσεις</strong> θα απονεμηθούν Κύπελλα και μετάλλια.
            </p>
            <div class="bg-amber-100 rounded-lg p-3 mt-2">
                <p class="text-xs text-blue-800 font-medium mb-1">Επιπλέον θα υπάρχουν βραβεία για διακεκριμένες ατομικές / ανα φύλο επιδόσεις του τουρνουά:</p>
                <p class="text-xs text-blue-700">• Βραβείο MVP (Πολυτιμότερου Παίκτη)</p>
                <p class="text-xs text-blue-700 mt-1">• Βραβείο Καλύτερου Πασαδόρου</p>
                <p class="text-xs text-blue-700 mt-1">• Βραβείο Καλύτερου Επιθετικού</p>
                <p class="text-xs text-blue-700 mt-1">• Βραβείο Καλύτερου Λίμπερο</p>
                <p class="text-xs text-blue-700 mt-1">• Βραβείο Καλύτερου Σέρβερ</p>
            </div>

        </div>

        <!-- Άρθρο 14 -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h2 class="font-medium text-[#1a3a6b] text-base mb-3 pb-2 border-b border-[#d4a017]">Άρθρο 7 — Σύνθεση Πάγκου & Τεχνικές Λεπτομέρειες</h2>
            <div class="text-sm text-gray-700 space-y-2">
                <p>Στον πάγκο κάθε ομάδας επιτρέπεται η παρουσία <strong>έως 5 ατόμων</strong> (προπονητής, βοηθός, φυσιοθεραπευτής/γιατρός, έφορος, φροντιστής/στατιστικολόγος).</p>
                <div class="grid grid-cols-2 gap-3 mt-3">
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-xs font-medium text-[#1a3a6b] mb-1">📏 Ύψος φιλέ</p>
                        <p class="text-sm font-bold text-gray-800">2,34 m</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-xs font-medium text-[#1a3a6b] mb-1">👕 Αριθμοί φανελών</p>
                        <p class="text-sm font-bold text-gray-800">00 έως 99</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-xs font-medium text-[#1a3a6b] mb-1">👥 Μέγ. αθλητές/αγώνα</p>
                        <p class="text-sm font-bold text-gray-800">14 αθλητές/τριες</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-xs font-medium text-[#1a3a6b] mb-1">🏐 Σύνθεση αγώνα</p>
                        <p class="text-sm font-bold text-gray-800">Εναλλάξ ♂ ♀</p>
                    </div>
                </div>
                <div class="bg-blue-50 rounded-lg p-3 mt-2 flex items-start gap-2">
                    <span class="text-lg">💧</span>
                    <p class="text-sm text-blue-800">Σε κάθε αγώνα παρέχεται <strong>δωρεάν νερό</strong> για κάθε αθλητή/τρια και προπονητή.</p>
                </div>
                <div class="bg-red-50 rounded-lg p-3 mt-2 flex items-start gap-2">
                    <span class="text-lg">❤️</span>
                    <p class="text-sm text-red-800">Κάθε αθλητής/τρια υποχρεούται να προσκομίσει <strong>βεβαίωση καρδιολόγου</strong> πριν την έναρξη του τουρνουά. Χωρίς αυτή δεν επιτρέπεται η συμμετοχή.</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-3 mt-2 flex items-start gap-2">
                    <span class="text-lg">🎥</span>
                    <p class="text-sm text-gray-700">Επιτρέπεται η <strong>ελεύθερη βιντεοσκόπηση</strong> των αγώνων.</p>
                </div>
            </div>

        </div>

        <div class="border-t border-[#d4a017]/30 pt-6 mt-8 text-center">
            <a href="/epikoinonia" class="inline-block bg-[#1a3a6b] text-white px-8 py-3 rounded-xl font-medium text-sm hover:bg-[#2563eb] transition mb-8">
                🏐 Δήλωσε την ομάδα σου!
            </a>
        </div>

    </div>
    @endsection