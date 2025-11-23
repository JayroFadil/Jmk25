<!-- DELETE MODAL OVERLAY -->
<div id="delete-modal" class="fixed inset-0 z-[10000] hidden items-center justify-center p-4" role="dialog"
  aria-modal="true">

  <!-- Backdrop (Gelap & Blur) -->
  <div class="absolute inset-0 bg-black/80 backdrop-blur-sm transition-opacity" onclick="closeDeleteModal()"></div>

  <!-- Modal Content (Small & Centered) -->
  <div
    class="relative w-[90vw] max-w-[320px] flex flex-col z-10 animate-modal-pop rounded-[2rem] overflow-hidden shadow-2xl ring-1 ring-white/10">

    <!-- CARD CONTAINER -->
    <div class="bg-secondBg w-full flex flex-col items-center text-center">

      <!-- BODY -->
      <div class="p-8">
        <div class="w-12 h-12 rounded-full bg-red-500/10 flex items-center justify-center mx-auto mb-4 text-red-500">
          <ion-icon name="trash-outline" class="text-2xl"></ion-icon>
        </div>

        <!-- Diberi ID agar teks bisa diganti dinamis (Hapus Post / Buang Draf) -->
        <h3 id="del-modal-title" class="text-mainText font-bold text-[18px] mb-2">Hapus Postingan?</h3>
        <p id="del-modal-desc" class="text-mainGray text-[14px] leading-relaxed">
          Tindakan ini tidak dapat dibatalkan. Postingan akan hilang selamanya dari timeline.
        </p>
      </div>

      <!-- FOOTER ACTIONS (Stacked Buttons) -->
      <div class="w-full flex flex-col border-t border-mainGray/20">

        <!-- Tombol Hapus (Merah) -->
        <!-- Menggunakan tag <a> tapi bisa dimanipulasi jadi button via JS -->
        <a id="confirm-delete-btn" href="#"
          class="w-full py-4 text-[15px] font-bold text-red-500 hover:bg-mainGray/5 transition-colors border-b border-mainGray/20 cursor-pointer flex justify-center items-center">
          Hapus
        </a>

        <!-- Tombol Batal -->
        <button onclick="closeDeleteModal()"
          class="w-full py-4 text-[15px] text-mainText hover:bg-mainGray/5 transition-colors">
          Batal
        </button>
      </div>

    </div>
  </div>
</div>

<style>
/* Animasi Pop-up (Sedikit membal) */
@keyframes modalPopScale {
  0% {
    transform: scale(0.95);
    opacity: 0;
  }

  50% {
    transform: scale(1.02);
    opacity: 1;
  }

  100% {
    transform: scale(1);
    opacity: 1;
  }
}

.animate-modal-pop {
  animation: modalPopScale 0.3s cubic-bezier(0.19, 1, 0.22, 1);
}
</style>

<script>
// FUNGSI BUKA MODAL (HYBRID: Bisa String URL atau Object Config)
window.openDeleteModal = function(config) {
  const modal = document.getElementById('delete-modal');
  const confirmBtn = document.getElementById('confirm-delete-btn');
  const titleEl = document.getElementById('del-modal-title');
  const descEl = document.getElementById('del-modal-desc');

  // Reset tombol
  confirmBtn.onclick = null;
  confirmBtn.href = "javascript:void(0)";
  confirmBtn.innerText = "Hapus";

  if (typeof config === 'string') {
    // --- MODE 1: HAPUS POSTINGAN BIASA (URL) ---
    // Dipanggil dari dashboard: openDeleteModal('/meme/delete/123')
    titleEl.innerText = "Hapus Postingan?";
    descEl.innerText = "Tindakan ini tidak dapat dibatalkan. Postingan akan hilang selamanya dari timeline.";
    confirmBtn.innerText = "Hapus";
    confirmBtn.href = config; // Set URL href

  } else if (typeof config === 'object') {
    // --- MODE 2: KONFIRMASI BUANG DRAF (CUSTOM) ---
    // Dipanggil dari CommentModal
    titleEl.innerText = config.title || "Hapus?";
    descEl.innerText = config.desc || "Anda yakin?";
    confirmBtn.innerText = config.btnText || "Hapus";

    // Gunakan onclick untuk callback JS
    confirmBtn.onclick = function(e) {
      e.preventDefault(); // Cegah href
      if (config.onConfirm) config.onConfirm();
      closeDeleteModal();
    };
  }

  // Tampilkan Modal
  modal.classList.remove('hidden');
  modal.classList.add('flex');

  // Lock Scroll
  document.body.style.overflow = 'hidden';
}

// FUNGSI TUTUP MODAL
window.closeDeleteModal = function() {
  const modal = document.getElementById('delete-modal');

  modal.classList.add('hidden');
  modal.classList.remove('flex');

  // Cek apakah Comment Modal masih terbuka?
  // Kalau ya, jangan buka scroll body dulu (biar ttp lock)
  const commentModal = document.getElementById('comment-modal');
  if (!commentModal || commentModal.classList.contains('hidden')) {
    document.body.style.overflow = '';
  }
}
</script>