// Generate random currency signs
for (let i = 0; i < 100; i++) {
    let size = Math.floor(Math.random() * 30) + 10; /* Random size between 10 and 40 */
    let x = Math.random() * 100; /* Random horizontal position */
    let y = Math.random() * 100; /* Random vertical position */

    let currencySign = document.createElement('div');
    currencySign.className = 'currency-sign';
    currencySign.style.width = `${size}px`;
    currencySign.style.height = `${size}px`;
    currencySign.style.left = `${x}vw`; /* Use 'vw' units for responsiveness */
    currencySign.style.top = `${y}vh`; /* Use 'vh' units for responsiveness */

    document.querySelector('.login-container::before').appendChild(currencySign);
}

function login() {
    // Add authentication logic here (this is just a placeholder)
    alert("Login button clicked. Add your authentication logic.");
}
