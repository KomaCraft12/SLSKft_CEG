# Cég nyilvántartás

## Leirás

A projekt célja egy egyszerű feladatkezelő rendszer készítése Laravel keretrendszer segítségével. A rendszer lehetővé teszi munkások (dolgozók), ügyfelek (costumers) és feladatok (tasks) kezelését, valamint biztosítja a CRUD műveleteket ezekre az entitásokra REST API-n keresztül.

## Végpontok

Az alábbiakban láthatók a rendszer által kínált API végpontok, amelyek segítségével elérhetőek az egyes entitásokhoz kapcsolódó CRUD műveletek:

### Workers

- GET /api/workers - összes dolgozó lekérése
- POST /api/workers - új dolgozó létrehozása
- GET /api/workers/{id} - adott dolgozó részleteinek lekérése
- PUT /api/workers/{id} - adott dolgozó frissítése
- DELETE /api/workers/{id} - adott dolgozó törlése

### Costumers

- GET /api/costumers - összes ügyfél lekérése
- POST /api/costumers - új ügyfél létrehozása
- GET /api/costumers/{id} - adott ügyfél részleteinek lekérése
- PUT /api/costumers/{id} - adott ügyfél frissítése
- DELETE /api/costumers/{id} - adott ügyfél törlése

### Tasks

- GET /api/tasks - összes feladat lekérése
- POST /api/tasks - új feladat létrehozása
- GET /api/tasks/{id} - adott feladat részleteinek lekérése
- PUT /api/tasks/{id} - adott feladat frissítése
- DELETE /api/tasks/{id} - adott feladat törlése