function applyMask(inputElement, maskFunction) {
    const input = inputElement;
    setTimeout(() => formatInput(input, maskFunction), 1);
}

function formatInput(input, maskFunction) {
    input.value = maskFunction(input.value);
}

function formatTelephone(telephone) {
    // Remove all non-digit characters
    telephone = telephone.replace(/\D/g, "");
    
    // Apply formatting based on the length of the input
    if (telephone.length > 0) {
        telephone = telephone.replace(/^(\d)/, "($1");
    }
    if (telephone.length > 3) {
        telephone = telephone.replace(/(.{3})(\d)/, "$1)$2");
    }
    if (telephone.length > 6) {
        telephone = telephone.replace(/(.{4})$/, "-$1");
    }
    
    return telephone;
}

// Example of how to attach the mask to an input field
document.getElementById('telephoneInput').addEventListener('input', function() {
    applyMask(this, formatTelephone);
});