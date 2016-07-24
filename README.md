# 회식나우(Whesiknow) 서비스 서버

- 회식나우란?

불특정 다수가 회식(식사 자리)을 갖게 될 경우 적절한 회식 장소 예약을 도와주고 더 나아가 해당 식당의 메뉴를 미리 주문할 수 있게끔 구성하여 회식의 편의성을 극대화한 회식 플랫폼

---

- 서버 구성 및 환경

1. Amazon Linux AMI 2016.03.3 x86_64 HVM GP2 (AWS EC2)
2. Httpd24
3. MySQL 5.6.27 (AWS RDS)
4. PHP 5.6 + Codeigniter 3.06 + rest server(https://github.com/chriskacerguis/codeigniter-restserver)

---

- 역할

1. RESTFul API 제공
2. Application으로 Push alarm 발송
3. CMS 기능 제공 (예정)

---

- 만족 사항

1. Application과 Server간 통신 로직이 포함되어 있음(SNS 연동 로그인, 유저 인증)
2. 페이스북, 카카오 로그인 가능
3. Amazon Web Service의 EC2, RDS를 이용, 배포
4. 데이터(User, Shop ...)가 DB에 저장되고 SQL을 통해 CRUD(생성, 조회, 수정, 삭제)가 가능

---

- 개선할 사항

1. 로그인 인증 관련 보안 및 RESTful API 보안 강화 필요
2. 서버 언어를 PHP 5.6에서 PHP 7으로 업데이트 필요
3. Amazon S3, CloudFront를 이용한 미디어 파일(사진, 동영상 ...) 처리 필요
4. CMS 기능 구현 필요

---

* [플레이 스토어 링크](-)
* [회식나우 안드로이드 애플리케이션 Github](https://github.com/knunu/whesiknow_android)


