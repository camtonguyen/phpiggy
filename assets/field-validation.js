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
