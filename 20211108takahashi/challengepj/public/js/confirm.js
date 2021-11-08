const inputItem = document.getElementsByClassName("input__item");
for (let i = 0; i < inputItem.length; i++) {
  if (inputItem[i].readOnly) {
    inputItem[i].tabIndex = "-1";
  }
}

const textareaItem = document.getElementsByClassName("textarea__item");
for (let i = 0; i < textareaItem.length; i++) {
  if (textareaItem[i].readOnly) {
    textareaItem[i].tabIndex = "-1";
  }
}
