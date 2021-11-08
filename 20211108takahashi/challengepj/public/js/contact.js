// 定数
const firstNameTitle = "氏名";
const lastNameTitle = "苗字";
const emailTitle = "メールアドレス";
const postcodeTitle = "郵便番号";
const addressTitle = "住所";
const opinionTitle = "ご意見";
const postcodeFormat = /^\d{3}-\d{4}$/g;  // 郵便番号書式
const upperValFormat = /[！-～]/g;  // 全角文字形式

// 変数
let value;
let idItem;
let addressValue;
let result = false;

// 苗字チェック
function chkLastName(element) {
  value = element.value;
  idItem = document.getElementById("err__lastname").id;
  document.getElementById(idItem).innerHTML = '';
  chkRequired(value, lastNameTitle, idItem);
}

// 氏名チェック
function chkFirstName(element) {
  value = element.value;
  idItem = document.getElementById("err__firstname").id;
  document.getElementById(idItem).innerHTML = '';
  chkRequired(value, firstNameTitle, idItem);
}

// メールアドレスチェック
function chkEmail(element) {
  value = element.value;
  idItem = document.getElementById("err__email").id;
  document.getElementById(idItem).innerHTML = '';
  result = chkRequired(value, emailTitle, idItem);
  if (result) {
    if (value.indexOf("@") == -1) {
      document.getElementById(idItem).innerHTML = `${emailTitle}形式で入力してください。`;
    }
  }
}

// 郵便番号チェック
function chkPostcode(element) {
  value = element.value;
  idItem = document.getElementById("err__postcode").id;
  document.getElementById(idItem).innerHTML = '';
  result = chkRequired(value, postcodeTitle, idItem);

  if (result) {
    // 半角変換
    value = toHalfWidth(value);

    // 8文字チェック、半角ハイフン込みの入力かチェック、郵便番号形式チェック
    if (value.length !== 8) {
      document.getElementById(idItem).innerHTML = `${postcodeTitle}形式(123-4567)で入力してください。`;
      result = false;
    } else if (value.indexOf("-") == -1) {
      document.getElementById(idItem).innerHTML = '4文字目に半角ハイフン(-)を含めて入力してください。';
      result = false;
    } else if (value.match(postcodeFormat) == null) {
      document.getElementById(idItem).innerHTML = `${postcodeTitle}形式(123-4567)で入力してください。`;
      result = false;
    }

  }
  document.getElementById('err__address').innerHTML = '';
  document.getElementById('address').value = '';
  element.value = value;
}

// 住所チェック
function chkAddress(element) {
  value = element.value;
  idItem = document.getElementById("err__address").id;
  const postcodeErr = document.getElementById("err__address").innerHTML;
  document.getElementById(idItem).innerHTML = '';
  if (postcodeErr == '') {
    chkRequired(value, addressTitle, idItem);
  }
}

// ご意見チェック
function chkOpinion(element) {
  value = element.value;
  idItem = document.getElementById("err__opinion").id;
  document.getElementById(idItem).innerHTML = '';
  result = chkRequired(value, opinionTitle, idItem);
  if (result) {
    if (value.length > 120) {
      document.getElementById(idItem).innerHTML = '120文字以内で入力してください。';
    }
  }
}

// 必須チェック
function chkRequired(value, nameItem, idItem) {
  if (value == null || value === '') {
    document.getElementById(idItem).innerHTML = `${nameItem}を入力してください。`;
    return false;
  }
  return true;
}

// 全角半角変換処理
function toHalfWidth(value) {
  var formatVal = value.replace(upperValFormat,
    function (tmpValue) {
      return String.fromCharCode(tmpValue.charCodeAt(0) - 0xFEE0);
    }
  );

  return formatVal.replace(/”/g, "\"")
    .replace(/’/g, "'")
    .replace(/‘/g, "`")
    .replace(/￥/g, "\xA5")
    .replace(/　/g, " ")
    .replace(/～/g, "~")
}
