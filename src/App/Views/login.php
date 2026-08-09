<?php include $this->resolve("Partials/_header.php"); ?>

<section class="max-w-2xl mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
  <form method="POST" class="grid grid-cols-1 gap-6">
    <?php include $this->resolve('Partials/_csrf.php'); ?>

    <label class="block">
      <span class="text-gray-700">Email address</span>
      <input value="<?= htmlspecialchars($old['email'] ?? '') ?>" name="email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="john@example.com" />
      <?php foreach ($errors['email'] ?? [] as $error): ?>
        <span class="field-error text-red-600 text-sm" data-field="email"><?= htmlspecialchars($error) ?></span>
      <?php endforeach; ?>
    </label>
    <label class="block">
      <span class="text-gray-700">Password</span>
      <input name="password" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" />
      <?php foreach ($errors['password'] ?? [] as $error): ?>
        <span class="field-error text-red-600 text-sm" data-field="password"><?= htmlspecialchars($error) ?></span>
      <?php endforeach; ?>
    </label>
    <button type="submit" class="block w-full py-2 bg-indigo-600 text-white rounded">
      Submit
    </button>
  </form>

  <script src="/assets/field-validation.js"></script>
</section>

<?php include $this->resolve("Partials/_footer.php"); ?>