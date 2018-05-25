## Project2 CarPark Reserve
## Member
| Name | Student ID|
|--|--|
| ศักย์ชัย ลิ้มสุขนิรันดร์ | 5810451063 |
| ฐิติ ตันติยนุกูลชัย | 5810450661 |
| กนกพล โทนะบุตร| 5810450172 |
| พิชญกุล เจนภูมิใจ | 5810450903 |

## How to use
....


## Installation
 1. Upload or clone ไฟล์ทั้งหมดมาไว้บน Server
 2. ติดตั้ง composer  composer install --no-dev –optimize-autoloader
 3. แก้ไขไฟล์ .env เพื่อเชื่อมต่อกับฐานข้อมูลที่เป็นของเราเอง และแก้ไขชื่อเว็บไซต์ email ต่าง ๆโดยไม่ควรเข้าไปจัดการที่ config โดยตรง
 4. ทำการ refresh .env ด้วยคำสั่ง php artisan config:cache
 5. ทำการ เชื่อมต่อกับฐานข้อมูลด้วยคำสั่ง php artisan migration
 6. รันคำสั่ง php artisan route:cache
           php artisan storage:link
 7. พร้อมใช้งาน
