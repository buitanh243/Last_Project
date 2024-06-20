<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Plus/Minus Input</title>
<style>
  .plus-minus-input {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100px; /* Độ rộng của input */
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 5px;
    font-size: 16px;
    overflow: hidden;
  }
  .plus-minus-button {
    cursor: pointer;
    padding: 5px;
    background-color: #f0f0f0;
    border: none;
    outline: none;
  }
</style>
</head>
<body>

<div class="plus-minus-input">
  <button class="plus-minus-button" id="minus-btn">-</button>
  <input type="number" id="value" value="0" style="width: 50px; text-align: center;" readonly>
  <button class="plus-minus-button" id="plus-btn">+</button>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const minusButton = document.getElementById('minus-btn');
    const plusButton = document.getElementById('plus-btn');
    const valueInput = document.getElementById('value');

    minusButton.addEventListener('click', function() {
      let currentValue = parseInt(valueInput.value);
      if (currentValue > 0) {
        valueInput.value = currentValue - 1;
      }
    });

    plusButton.addEventListener('click', function() {
      let currentValue = parseInt(valueInput.value);
      valueInput.value = currentValue + 1;
    });
  });
</script>

</body>
</html>
