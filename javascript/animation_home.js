const text = document.querySelector('.animated-text');
const cursor = document.querySelector('.animated-cursor');

let i = 0;

function type() {
  if (i < text.innerHTML.length) {
    cursor.style.display = 'none';
    text.innerHTML += text.innerHTML.charAt(i);
    i++;
    setTimeout(type, 100);
  } else {
    cursor.style.display = 'inline-block';
    setTimeout(erase, 2000);
  }
}

function erase() {
  if (i > 0) {
    cursor.style.display = 'none';
    text.innerHTML = text.innerHTML.slice(0, -1);
    i--;
    setTimeout(erase, 50);
  } else {
    cursor.style.display = 'inline-block';
    setTimeout(type, 1000);
  }
}

document.addEventListener('DOMContentLoaded', () => {
  setTimeout(type, 1000);
});
