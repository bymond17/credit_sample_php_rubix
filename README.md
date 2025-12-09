# Credit Sample PHP Rubix ML

Rubix ML을 활용한 PHP 기반 신용 승인 예측 예제 프로젝트입니다.  
나이, 소득, 대출금액을 입력받아 승인/미승인을 예측합니다.

---

## 폴더 구조

```
credit_sample_php_rubix/
├── composer.json
├── docker-compose.yml
├── Dockerfile
├── README.md
├── models/
│   └── credit_model.rbx         # 학습된 Rubix ML 모델 파일
├── public/
│   └── index.php                # 웹 진입점(폼/예측)
├── src/
│   ├── DataGenerator.php        # 랜덤 데이터 생성
│   ├── ModelTrainer.php         # 모델 학습/저장/로드
│   └── PredictService.php       # 예측 비즈니스 로직
```

---

## 주요 기능

- Rubix ML 기반 신용 승인 예측
- 다층 신경망(MLPClassifier) 구조 적용
- 폼 입력 및 REST API 예측 지원
- 도커로 완전 자동화(환경/의존성/실행)
- 코드 역할별 분리(데이터/모델/서비스)

---

## 빠른 시작

### 1. 도커로 실행

```bash
docker-compose up --build
```

- 기본적으로 8000번 포트에서 PHP 서버가 실행됩니다.
- 브라우저에서 [http://localhost:8000](http://localhost:8000) 접속

### 2. 폼 예측 테스트

- 웹 폼에서 나이, 소득, 대출금액 입력 후 예측 결과 확인

### 3. API 테스트

```powershell
curl -Method POST -Headers @{"Content-Type"="application/json"} -Body '{"age":30,"income":6000,"loan":1200}' http://localhost:8000/
```

---

## 코드 설명

- `public/index.php` : 폼 및 API 진입점, 예측 결과 출력
- `src/DataGenerator.php` : 랜덤 학습 데이터 생성
- `src/ModelTrainer.php` : Rubix ML 모델 학습/저장/로드
- `src/PredictService.php` : 모델 불러와서 예측 처리
- `models/credit_model.rbx` : 학습된 모델 파일(직렬화 저장)

---

## 도커 환경

- PHP 8.5 + Composer + Rubix ML
- `Dockerfile` : 환경 자동화 및 의존성 설치
- `docker-compose.yml` : 컨테이너 실행 설정

---

## 참고

- Rubix ML 공식 문서: https://rubixml.com/
- PHP 공식 문서: https://www.php.net/