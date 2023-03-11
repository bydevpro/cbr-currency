const amount2 = document.getElementById("amount2");
const currency2 = document.getElementById("currency2");
const result2 = document.getElementById("result2");
const convert2Btn = document.querySelector("button[type='submit2']");

convert2Btn.addEventListener("click", (event) => {
  event.preventDefault();
  const amount = amount2.value;
  const currencyValue = currency2.value;
  console.log(currencyValue);
  console.log(currency2);
  const result = amount / currencyValue;
  result2.value = result.toFixed(4);
});
