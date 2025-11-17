<!-- <h1 class="text-3xl font-bold underline">
  <?= $model["title"]?>
</h1> -->

<?php 
    $memes = $model['data']['memes'];
  ?>
<div class="">
  <div
    class="flex flex-col mx-auto w-[43%] p-6 border border-[var(--mainGray)] rounded-3xl shadow bg-[var(--secondBg)] mt-20 mb-20">
    <?php if (is_array($memes)): ?>
    <?php foreach ($memes as $meme): ?>
    <div class="flex flex-col border-b border-[var(--mainGray)] pb-6 mb-6">
      <div class="profile flex items-center gap-1 mb-3">
        <ion-icon name="person-circle-outline" class="text-5xl text-[var(--mainText)]"></ion-icon>
        <p class="text-base text-[var(--mainText)]"><?= $meme['author']; ?></p>
      </div>
      <p class="ml-1 mb-2 text-[var(--mainText)] text-base"><?= $meme['title'] ?></p>
      <img src="<?= $meme['url'] ?>" alt="Meme" class="max-w-full rounded-lg border border-[var(--mainGray)]">
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <p>Gagal ambil data meme dari API. Coba refresh nanti.</p>
    <?php endif; ?>
  </div>
</div>