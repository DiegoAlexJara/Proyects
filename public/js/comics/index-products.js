function updateCharCount() {
    var textarea = document.getElementById('description');
    var maxLength = textarea.getAttribute('maxlength');
    var currentLength = textarea.value.length;
    var charCount = document.getElementById('charCount');
    charCount.textContent = (maxLength - currentLength) + ' Caracteres Restantes';
}