document.querySelectorAll(".property #propertyPrice").forEach(price => {
  let priceInt = parseInt(price.textContent);
  let priceFormatted = format1(priceInt, "$");
  price.textContent = priceFormatted;
});

function format1(n, currency) {
  return (
    currency +
    n.toFixed(2).replace(/./g, function(c, i, a) {
      return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
    })
  );
}
