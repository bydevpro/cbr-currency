const amount1 = document.getElementById("amount1");
const currency1 = document.getElementById("currency1");

const result1 = document.getElementById("result1");
const convertBtn = document.querySelector("button[type='submit']");

convertBtn.addEventListener("click", (event) => {
  event.preventDefault();
  const amount = amount1.value;
  const currencyValue = currency1.value;
  console.log (currencyValue);
  console.log(currency1);
  const result = amount * currencyValue;
  result1.value = result.toFixed(4); 
});