# Credit Sample PHP Rubix ML API

이 프로젝트는 Rubix ML을 활용한 PHP 기반 간단 분류 API 예제입니다.  
나이, 소득, 대출금액을 입력받아 승인/미승인을 예측합니다.

## 구성

- PHP 8.5
- Rubix ML
- Docker/Docker Compose 지원
- 단순 REST API (POST 방식)

## 실행 방법

### 1. Docker로 실행

```bash
docker-compose up --build
```

- 기본적으로 5001번 포트에서 PHP 서버가 실행됩니다.

### 2. API 테스트

#### PowerShell에서 테스트

```powershell
curl -Method POST -Headers @{"Content-Type"="application/json"} -Body '{"age":30,"income":6000,"loan":1200}' http://localhost:5001/
```

#### 크롬 콘솔에서 테스트

```javascript
fetch('http://localhost:5001/', {method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({age:30,income:6000,loan:1200})}).then(res=>res.json()).then(console.log);
```

## API 설명

- **POST /**  
  - 요청 예시(JSON):
    ```json
    {
      "age": 30,
      "income": 6000,
      "loan": 1200
    }
    ```
  - 응답 예시(JSON):
    ```json
    {
      "result": "1" // 1: 승인, 0: 미승인
    }
    ```

## 주요 파일

- `index.php` : Rubix ML 분류 모델 및 API 엔드포인트
- `Dockerfile` : PHP 및 Rubix ML 환경 설정
- `docker-compose.yml` : 컨테이너 실행 설정

## 참고

- Rubix ML 공식 문서: https://rubixml.com/
- PHP 공식 문서: https://www.php.net/