<!-- Comment Modal - Threads Style -->
<style>
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100vw;
  height: 100vh;
  z-index: 999999;
  display: none;
  align-items: center;
  justify-content: center;
  padding: 20px;
}

.modal-overlay.show {
  display: flex !important;
}

.modal-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.93);
  z-index: 1;
}

.modal-container {
  position: relative;
  z-index: 2;
  width: 100%;
  max-width: 600px;
  background: #1e1e1e;
  border-radius: 20px;
  overflow: hidden;
  animation: modalSlide 0.2s ease-out;
}

@keyframes modalSlide {
  from {
    transform: scale(0.95);
    opacity: 0;
  }

  to {
    transform: scale(1);
    opacity: 1;
  }
}

#send-reply-btn.active {
  color: #fff !important;
  cursor: pointer !important;
}

.modal-container textarea {
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}
</style>

<div id="comment-modal" class="modal-overlay">

  <!-- Backdrop (Klik -> Trigger Close Logic) -->
  <div class="modal-backdrop" onclick="closeCommentModal()"></div>

  <!-- Modal Box -->
  <div class="modal-container">

    <!-- Header -->
    <div class="flex items-center justify-between px-4 py-3 border-b border-[#2a2a2a]">
      <button onclick="closeCommentModal()"
        class="text-white text-[15px] hover:text-gray-400 transition-colors min-w-[50px] text-left">
        Batal
      </button>
      <span class="text-white font-bold text-[16px]">Balas</span>
      <button class="text-white text-xl hover:text-gray-400 transition-colors min-w-[50px] flex justify-end">
        <ion-icon name="ellipsis-horizontal"></ion-icon>
      </button>
    </div>

    <!-- Body -->
    <div class="px-4 py-4 max-h-[60vh] overflow-y-auto">

      <!-- Original Post -->
      <div class="flex gap-3 pb-2">
        <!-- Avatar Column -->
        <div class="flex flex-col items-center w-9 shrink-0">
          <div id="modal-avatar"
            class="w-9 h-9 rounded-full bg-[#333] flex items-center justify-center text-gray-400 overflow-hidden">
            <ion-icon name="person" class="text-base"></ion-icon>
          </div>
          <!-- Thread Line -->
          <div class="w-[1.5px] bg-[#3a3a3a] flex-1 mt-2 mb-0"></div>
        </div>

        <!-- Post Content -->
        <div class="flex-1 min-w-0">
          <div class="flex items-center gap-1.5 mb-1.5">
            <span id="modal-author" class="font-semibold text-white text-[15px]">Pengguna</span>
            <ion-icon id="modal-verified" name="checkmark-circle" class="text-[#0095f6] text-base hidden"></ion-icon>
            <span id="modal-time" class="text-gray-500 text-[13px]">1j</span>
          </div>
          <p id="modal-text" class="text-white text-[15px] leading-normal mb-3"></p>

          <div id="modal-quote"
            class="hidden bg-[#0a0a0a] border border-[#333] rounded-2xl p-3.5 text-white text-[15px] mb-3 leading-normal">
          </div>

          <div id="modal-translate" class="text-gray-500 text-[13px] mb-3 hidden">Terjemahkan</div>
        </div>
      </div>

      <!-- Reply Section -->
      <div class="flex gap-3 pt-0">
        <!-- User Avatar -->
        <div class="w-9 shrink-0">
          <div class="w-9 h-9 rounded-full overflow-hidden bg-gradient-to-br from-red-600 to-red-500">
            <img src="https://ui-avatars.com/api/?name=ME&background=dc2626&color=fff&bold=true"
              class="w-full h-full object-cover">
          </div>
        </div>

        <!-- Reply Input -->
        <div class="flex-1 min-w-0">
          <div class="flex items-center gap-1.5 mb-1.5">
            <span class="font-semibold text-white text-[15px]">roti.enc</span>
            <ion-icon name="chevron-forward" class="text-gray-600 text-[10px]"></ion-icon>
            <span class="text-gray-500 text-[13px]">Tambahkan topik</span>
          </div>

          <textarea id="reply-input" rows="1" placeholder="Balas ke Pengguna..."
            class="w-full bg-transparent border-none text-white text-[15px] resize-none outline-none leading-normal placeholder-gray-600 mb-3"
            oninput="autoResizeModal(this); checkInputModal(this)"></textarea>

          <!-- Action Icons -->
          <div class="flex items-center gap-3 mb-3.5 text-gray-600">
            <button class="hover:text-gray-400 transition-colors">
              <ion-icon name="image-outline" class="text-[20px]"></ion-icon>
            </button>
            <button class="hover:text-gray-400 transition-colors">
              <ion-icon name="gift-outline" class="text-[20px]"></ion-icon>
            </button>
            <button class="hover:text-gray-400 transition-colors">
              <ion-icon name="happy-outline" class="text-[20px]"></ion-icon>
            </button>
            <button class="hover:text-gray-400 transition-colors">
              <ion-icon name="menu-outline" class="text-[20px]"></ion-icon>
            </button>
            <button class="hover:text-gray-400 transition-colors">
              <ion-icon name="document-text-outline" class="text-[20px]"></ion-icon>
            </button>
            <button class="hover:text-gray-400 transition-colors">
              <ion-icon name="location-outline" class="text-[20px]"></ion-icon>
            </button>
          </div>

          <!-- Add to Thread -->
          <div class="flex items-center gap-2.5">
            <div class="w-[18px] h-[18px] rounded-full border-[1.5px] border-gray-700"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="flex items-center justify-end px-4 py-3 border-t border-[#2a2a2a]">
      <button id="send-reply-btn"
        class="text-gray-600 font-bold text-[15px] bg-transparent border-none cursor-not-allowed transition-colors px-1">
        Kirim
      </button>
    </div>
  </div>
</div>

<script>
window.openCommentModal = function(data) {
  data = data || {};
  var modal = document.getElementById('comment-modal');
  var input = document.getElementById('reply-input');

  // Populate Data
  document.getElementById('modal-author').innerText = data.author || 'Pengguna';
  document.getElementById('modal-text').innerText = data.text || 'Konten postingan...';
  document.getElementById('modal-time').innerText = data.time || '1j';

  // Avatar Handling
  var avatarEl = document.getElementById('modal-avatar');
  if (data.avatar) {
    avatarEl.innerHTML = '<img src="' + data.avatar + '" class="w-full h-full object-cover">';
  } else {
    avatarEl.innerHTML = '<ion-icon name="person" class="text-lg"></ion-icon>';
  }

  // Helper UI Elements
  var verifiedEl = document.getElementById('modal-verified');
  data.verified ? verifiedEl.classList.remove('hidden') : verifiedEl.classList.add('hidden');

  var quoteEl = document.getElementById('modal-quote');
  if (data.quote) {
    quoteEl.classList.remove('hidden');
    quoteEl.innerHTML = data.quote;
  } else {
    quoteEl.classList.add('hidden');
  }

  var translateEl = document.getElementById('modal-translate');
  data.showTranslate ? translateEl.classList.remove('hidden') : translateEl.classList.add('hidden');

  // Reset Input
  input.placeholder = 'Balas ke ' + (data.author || 'pengguna') + '...';
  input.value = '';
  input.style.height = 'auto';
  checkInputModal(input);

  // Show Modal
  modal.classList.add('show');
  document.body.style.overflow = 'hidden';
  setTimeout(function() {
    input.focus();
  }, 100);
};

// --- LOGIKA UTAMA (UPDATE) ---
// Dipanggil saat Klik Batal atau Klik Backdrop
window.closeCommentModal = function() {
  var input = document.getElementById('reply-input');

  // 1. Cek apakah user sudah mengetik?
  if (input && input.value.trim().length > 0) {

    // 2. Panggil Modal Delete (Jika script DeleteModal sudah diload di dashboard)
    if (typeof window.openDeleteModal === 'function') {
      window.openDeleteModal({
        title: "Buang balasan?",
        desc: "Balasan ini tidak akan disimpan jika kamu keluar sekarang.",
        btnText: "Buang",
        onConfirm: function() {
          // User setuju -> Tutup Modal Komentar Paksa
          forceCloseCommentModal();
        }
      });
      return; // Stop disini, jangan tutup modal dulu
    } else {
      console.warn("DeleteModal script not found!");
    }
  }

  // 3. Jika kosong, langsung tutup
  forceCloseCommentModal();
};

// Fungsi Tutup Paksa (Tanpa Cek)
window.forceCloseCommentModal = function() {
  var modal = document.getElementById('comment-modal');
  var input = document.getElementById('reply-input');

  modal.classList.remove('show');
  document.body.style.overflow = '';
  if (input) input.value = '';
};

window.autoResizeModal = function(el) {
  el.style.height = 'auto';
  el.style.height = el.scrollHeight + 'px';
};

window.checkInputModal = function(el) {
  var btn = document.getElementById('send-reply-btn');
  if (el.value.trim().length > 0) {
    btn.classList.add('active');
  } else {
    btn.classList.remove('active');
  }
};

document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    // Cek dulu apakah Modal Delete sedang terbuka?
    const deleteModal = document.getElementById('delete-modal');
    // Kalau Modal Delete terbuka (tidak hidden), jangan tutup Comment Modal dulu
    if (deleteModal && !deleteModal.classList.contains('hidden')) {
      return;
    }
    closeCommentModal();
  }
});
</script>