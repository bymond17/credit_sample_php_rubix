<?php
require_once __DIR__ . '/vendor/autoload.php';

use Rubix\ML\Classifiers\LogisticRegression;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;

// 샘플 데이터
$samples = [
    [25, 3000, 500],
    [40, 8000, 2000],
    [35, 5000, 1000],
    [50, 12000, 3000],
    [23, 2500, 400],
    [60, 15000, 5000],
];
$labels = ['1', '1', '1', '1', '0', '0'];

// 모델 생성 및 학습
$dataset = new Labeled($samples, $labels);
$model = new LogisticRegression();
$model->train($dataset);

// 폼에서 입력받아 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $age = isset($_POST['age']) ? intval($_POST['age']) : null;
    $income = isset($_POST['income']) ? intval($_POST['income']) : null;
    $loan = isset($_POST['loan']) ? intval($_POST['loan']) : null;

    if ($age !== null && $income !== null && $loan !== null) {
        $test = new Unlabeled([[$age, $income, $loan]]);
        $predictions = $model->predict($test);
        $result = $predictions[0];
        echo "<h2>예측 결과: " . ($result === '1' ? "승인" : "미승인") . "</h2>";
        echo '<a href="/">다시 입력하기</a>';
        exit;
    } else {
        echo "<h2>모든 값을 입력해주세요.</h2>";
    }
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