## Project2 CarPark Reserve
## Member
| Name | Student ID|
|--|--|
| ศักย์ชัย ลิ้มสุขนิรันดร์ | 5810451063 |
| ฐิติ ตันติยนุกูลชัย | 5810450661 |
| กนกพล โทนะบุตร| 5810450172 |
| พิชญกุล เจนภูมิใจ | 5810450903 |

## Installation
 1. Upload or clone ไฟล์ทั้งหมดมาไว้บน Server
 2. ติดตั้ง composer  composer install --no-dev –optimize-autoloader
 3. แก้ไขไฟล์ .env เพื่อเชื่อมต่อกับฐานข้อมูลที่เป็นของเราเอง และแก้ไขชื่อเว็บไซต์ email ต่าง ๆโดยไม่ควรเข้าไปจัดการที่ config โดยตรง
 4. ทำการ refresh .env ด้วยคำสั่ง php artisan config:cache
 5. ทำการ เชื่อมต่อกับฐานข้อมูลด้วยคำสั่ง php artisan migration
 6. รันคำสั่ง php artisan route:cache
           php artisan storage:link
 7. พร้อมใช้งาน

## How to use
 1. สมัครสมาชิก
 2. login
 3. จะมีเมนู create praking  กับ package to reserve กดเข้าไปซื้อ package ตามที่ต้องการใช้งาน
 
การใช้งานจะแบ่งเป็น 2 ส่วนตามประเภทของ packeage ที่ซื้อ
สำหรับ parking owner
 4. กดเมนู create praking เพื่อสร้างที่จอดรถ
 5. ไปที่เมนู praking manager กดไปที่ edit เพื่อเพิ่มชั้นจอดรถ จากนั้นใส่รูปแล้วกำหนดช่องจอดให้เรียบร้อย
 6. เราสามารถตรวจดูที่จอดรถได้ที่หน้าแรกแล้วกดปุ่ม serach หาที่จอดรถที่เราสร้าง
    สำหรับ reserve
