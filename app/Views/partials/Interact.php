<?php require_once __DIR__ . '/CommentModal.php'; ?>
<div class="flex items-center justify-between mt-3 mb-2">

  <div class="flex items-center gap-6">
    <button onclick="toggleLike(this)" id="likes"
      class="group flex items-center gap-2 cursor-pointer transition-colors text-mainText hover:text-red-500">
      <ion-icon name="heart-outline" class="text-2xl group-hover:scale-110 transition-transform"></ion-icon>
      <span class="count-label text-sm font-medium text-mainGray transition-colors">1.2k</span>
    </button>

    <button onclick="handleComment(this)" id="comment"
      class="group flex items-center gap-2 cursor-pointer transition-colors text-mainText hover:text-blue-400">
      <ion-icon name="chatbubble-outline" class="text-2xl group-hover:scale-110 transition-transform"></ion-icon>
      <span class="text-sm font-medium text-mainGray transition-colors">45</span>
    </button>

    <button onclick="handleShare(this)" id="shared"
      class="group flex items-center cursor-pointer transition-colors text-mainText hover:text-blue-400 relative">
      <ion-icon name="paper-plane-outline" class="text-2xl group-hover:scale-110 transition-transform"></ion-icon>
      <span
        class="share-tooltip absolute -top-8 left-1/2 -translate-x-1/2 bg-black text-white text-[10px] px-2 py-1 rounded opacity-0 transition-opacity pointer-events-none">Copied!</span>
    </button>

  </div>

  <button onclick="toggleBookmark(this)" id="bookmark"
    class="group flex items-center cursor-pointer transition-colors text-mainText hover:text-accent">
    <ion-icon name="bookmark-outline" class="text-2xl group-hover:scale-110 transition-transform"></ion-icon>
  </button>

</div>

<script>
if (!window.interactFunctionsDefined) {
  window.interactFunctionsDefined = true;

  window.toggleLike = function(btn) {
    const icon = btn.querySelector('ion-icon');
    const isActive = btn.classList.contains('text-red-500');

    if (!isActive) {
      btn.classList.remove('text-mainText');
      btn.classList.add('text-red-500');
      icon.setAttribute('name', 'heart');

      icon.classList.add('scale-125');
      setTimeout(() => icon.classList.remove('scale-125'), 200);
    } else {
      btn.classList.remove('text-red-500');
      btn.classList.add('text-mainText');
      icon.setAttribute('name', 'heart-outline');
    }
  };

  window.toggleBookmark = function(btn) {
    const icon = btn.querySelector('ion-icon');
    const isActive = btn.classList.contains('text-accent');

    if (!isActive) {
      btn.classList.remove('text-mainText');
      btn.classList.add('text-accent');
      icon.setAttribute('name', 'bookmark');

      icon.classList.add('scale-125');
      setTimeout(() => icon.classList.remove('scale-125'), 200);
    } else {
      btn.classList.remove('text-accent');
      btn.classList.add('text-mainText');
      icon.setAttribute('name', 'bookmark-outline');
    }
  };

  window.handleComment = function(btn) {
    const icon = btn.querySelector('ion-icon');

    icon.classList.add('scale-90');
    setTimeout(() => icon.classList.remove('scale-90'), 150);

    window.openCommentModal({
      author: 'Pengguna',
      text: 'Ini konten postingan asli',
      time: '1j',
      avatar: 'url_avatar',
      verified: true, // optional
      quote: '<p>Quote content</p>', // optional
      showTranslate: true // optional
    })
  };

  window.handleShare = function(btn) {
    const icon = btn.querySelector('ion-icon');
    const tooltip = btn.querySelector('.share-tooltip');

    icon.classList.add('translate-x-1', '-translate-y-1');
    setTimeout(() => icon.classList.remove('translate-x-1', '-translate-y-1'), 200);

    if (tooltip) {
      tooltip.classList.remove('opacity-0');
      setTimeout(() => tooltip.classList.add('opacity-0'), 1500);
    }
  };
}
</script>