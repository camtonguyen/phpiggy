<?php include $this->resolve("Partials/_header.php"); ?>

<section class="max-w-2xl min-w-full-mx mr-3 mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
  <form method="POST" class="grid grid-cols-1 gap-6">
    <!-- Email -->
    <label class="block">
      <span class="text-gray-700">Email address</span>
      <input value="<?= htmlspecialchars($old['email'] ?? '') ?>" name="email" type="email" class="mt-1 block w-full rounded-md shadow-sm focus:ring focus:ring-opacity-50 <?= !empty($errors['email']) ? 'border-red-500 focus:border-red-500 focus:ring-red-200' : 'border-gray-300 focus:border-indigo-300 focus:ring-indigo-200' ?>" placeholder="john@example.com" />
      <?php foreach ($errors['email'] ?? [] as $error): ?>
        <span class="field-error text-red-600 text-sm" data-field="email"><?= htmlspecialchars($error) ?></span>
      <?php endforeach; ?>
    </label>
    <!-- Age -->
    <label class="block">
      <span class="text-gray-700">Age</span>
      <input value="<?= htmlspecialchars($old['age'] ?? '') ?>" name="age" type="number" class="mt-1 block w-full rounded-md shadow-sm focus:ring focus:ring-opacity-50 <?= !empty($errors['age']) ? 'border-red-500 focus:border-red-500 focus:ring-red-200' : 'border-gray-300 focus:border-indigo-300 focus:ring-indigo-200' ?>" placeholder="" />
      <?php foreach ($errors['age'] ?? [] as $error): ?>
        <span class="field-error text-red-600 text-sm" data-field="age"><?= htmlspecialchars($error) ?></span>
      <?php endforeach; ?>
    </label>
    <!-- Country -->
    <label class="block">
      <span class="text-gray-700">Country</span>
      <select name="country" class="block w-full mt-1 rounded-md shadow-sm focus:ring focus:ring-opacity-50 <?= !empty($errors['country']) ? 'border-red-500 focus:border-red-500 focus:ring-red-200' : 'border-gray-300 focus:border-indigo-300 focus:ring-indigo-200' ?>">
        <option value="" <?= ($old['country'] ?? '') === '' ? 'selected' : '' ?>>Select a country</option>
        <option value="USA" <?= ($old['country'] ?? '') === 'USA' ? 'selected' : '' ?>>USA</option>
        <option value="Canada" <?= ($old['country'] ?? '') === 'Canada' ? 'selected' : '' ?>>Canada</option>
        <option value="Mexico" <?= ($old['country'] ?? '') === 'Mexico' ? 'selected' : '' ?>>Mexico</option>
        <option value="Invalid" <?= ($old['country'] ?? '') === 'Invalid' ? 'selected' : '' ?>>Invalid Country</option>
      </select>
      <?php foreach ($errors['country'] ?? [] as $error): ?>
        <span class="field-error text-red-600 text-sm" data-field="country"><?= htmlspecialchars($error) ?></span>
      <?php endforeach; ?>
    </label>
    <!-- Social Media URL -->
    <label class="block">
      <span class="text-gray-700">Social Media URL</span>
      <input value="<?= htmlspecialchars($old['socialMediaURL'] ?? '') ?>" name="socialMediaURL" type="text" class="mt-1 block w-full rounded-md shadow-sm focus:ring focus:ring-opacity-50 <?= !empty($errors['socialMediaURL']) ? 'border-red-500 focus:border-red-500 focus:ring-red-200' : 'border-gray-300 focus:border-indigo-300 focus:ring-indigo-200' ?>" placeholder="" />
      <?php foreach ($errors['socialMediaURL'] ?? [] as $error): ?>
        <span class="field-error text-red-600 text-sm" data-field="socialMediaURL"><?= htmlspecialchars($error) ?></span>
      <?php endforeach; ?>
    </label>
    <!-- Password -->
    <label class="block">
      <span class="text-gray-700">Password</span>
      <input name="password" type="password" class="mt-1 block w-full rounded-md shadow-sm focus:ring focus:ring-opacity-50 <?= !empty($errors['password']) ? 'border-red-500 focus:border-red-500 focus:ring-red-200' : 'border-gray-300 focus:border-indigo-300 focus:ring-indigo-200' ?>" placeholder="" />
      <?php foreach ($errors['password'] ?? [] as $error): ?>
        <span class="field-error text-red-600 text-sm" data-field="password"><?= htmlspecialchars($error) ?></span>
      <?php endforeach; ?>
    </label>
    <!-- Confirm Password -->
    <label class="block">
      <span class="text-gray-700">Confirm Password</span>
      <input name="confirmPassword" type="password" class="mt-1 block w-full rounded-md shadow-sm focus:ring focus:ring-opacity-50 <?= !empty($errors['confirmPassword']) ? 'border-red-500 focus:border-red-500 focus:ring-red-200' : 'border-gray-300 focus:border-indigo-300 focus:ring-indigo-200' ?>" placeholder="" />
      <?php foreach ($errors['confirmPassword'] ?? [] as $error): ?>
        <span class="field-error text-red-600 text-sm" data-field="confirmPassword"><?= htmlspecialchars($error) ?></span>
      <?php endforeach; ?>
    </label>
    <!-- Terms of Service -->
    <div class="block">
      <div class="mt-2">
        <div>
          <label class="inline-flex items-center">
            <input name="tos" class="rounded text-indigo-600 shadow-sm focus:ring focus:ring-offset-0 focus:ring-opacity-50 <?= !empty($errors['tos']) ? 'border-red-500 focus:border-red-500 focus:ring-red-200' : 'border-gray-300 focus:border-indigo-300 focus:ring-indigo-200' ?>" type="checkbox" <?= !empty($old['tos']) ? 'checked' : '' ?> />
            <span class="ml-2">I accept the terms of service.</span>
          </label>
        </div>
      </div>
      <?php foreach ($errors['tos'] ?? [] as $error): ?>
        <span class="field-error text-red-600 text-sm" data-field="tos"><?= htmlspecialchars($error) ?></span>
      <?php endforeach; ?>
    </div>
    <button type="submit" class="block w-full py-2 bg-indigo-600 text-white rounded">
      Submit
    </button>
  </form>

  <script>
    document.querySelectorAll('form input, form select').forEach((field) => {
      field.addEventListener('input', () => {
        const hasValue = field.type === 'checkbox' ? field.checked : field.value.trim() !== '';
        if (!hasValue) return;

        document.querySelectorAll(`.field-error[data-field="${field.name}"]`).forEach((error) => {
          error.remove();
        });

        field.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-200');
        field.classList.add('border-gray-300', 'focus:border-indigo-300', 'focus:ring-indigo-200');
      });
    });
  </script>
</section>

<?php include $this->resolve("Partials/_footer.php"); ?>