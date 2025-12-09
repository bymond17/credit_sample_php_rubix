<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Src\PredictService;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $age = intval($_POST['age'] ?? 0);
  $income = intval($_POST['income'] ?? 0);
  $loan = intval($_POST['loan'] ?? 0);

  $result = (new PredictService())->predict([$age, $income, $loan]);
  echo "<h2>예측 결과: " . ($result === '1' ? "승인" : "미승인") . "</h2>";
  echo '<a href="/">다시 입력하기</a>';
  exit;
}
?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <title>승인 예측 테스트</title>
</head>

<body>
  <h2>승인 예측 테스트</h2>
  <form method="post">
    <label>나이: <input type="number" name="age" required></label><br>
    <label>소득: <input type="number" name="income" required></label><br>
    <label>대출금액: <input type="number" name="loan" required></label><br>
    <button type="submit">예측하기</button>
  </form>
</body>

</html>