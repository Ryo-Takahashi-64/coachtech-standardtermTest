document.querySelector('input[type="date"]').addEventListener('change', event => {
  const target = event.target;
  target.setAttribute('data-date', target.value);
}, false);

const idItem = document.getElementById("id");
for (let i = 0; i < inputItem.length; i++) {
  if (inputItem[i].readOnly) {
    inputItem[i].tabIndex = "-1";
  }
}