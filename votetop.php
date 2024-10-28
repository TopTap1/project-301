<html>
 <head>
  <title>
   เลือกพรรคที่ต้องการโหวต
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #000000, #434343);
            color: #000;
        }
        .header {
            background-color: #a64ca6;
            padding: 10px;
            text-align: left;
            color: white;
            font-size: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .menu {
            display: flex;
            gap: 10px;
        }
        .header .menu button {
            background-color: #000;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        .header .menu button:hover {
            background-color: #333;
        }
        .container {
            text-align: center;
            padding: 20px;
        }
        .container h1 {
            color: white;
            font-size: 36px;
        }
        .card-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .card {
            background-color: #f0f0f0;
            border-radius: 10px;
            width: 300px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
        }
        .card img {
            width: 100%;
            border-radius: 10px;
        }
        .card h2 {
            font-size: 24px;
            margin: 10px 0;
        }
        .card p {
            font-size: 16px;
            margin: 10px 0;
            text-align: left;
        }
        .card button {
            background-color: #ffcc00;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .card button:hover {
            background-color: #e6b800;
        }
        .middle-button {
            background-color: #ffccff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
        }
        .middle-button:hover {
            background-color: #e6b3e6;
        }
        .expand-icon {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
  </style>
 </head>
 <body>
  <div class="header">
   <span>
    ...
   </span>
   <div class="menu">
    <button>
     หน้าแรก
    </button>
    <button>
     ผลการโหวต
    </button>
    <button>
     ผู้มาใช้สิทธิ์
    </button>
   </div>
  </div>
  <div class="container">
   <h1>
    เลือกพรรคที่ต้องการโหวต
   </h1>
   <div class="card-container">
    <div class="card">
     <img alt="Group of people discussing in an office setting" height="200" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnBfGEmVv--6pJ3kKba0SB8ptey_m0M568LQ&s" width="300"/>
     <h2>
      พรรค ผ่อน
     </h2>
     <p>
      <strong>
       วิสัยทัศน์
      </strong>
     </p>
     <p>
      ลดเวลาเรียน เพิ่มเวลาทำกิจกรรม เน้นการเรียนรู้แบบสนุกสนาน กิจกรรมนอกห้องเรียนสำคัญกว่า สอบปลายภาคแบบ open book (อาจมีข้อจำกัดบางวิชา)
     </p>
     <button>
      ลงคะแนน
     </button>
     <i class="fas fa-expand expand-icon">
     </i>
    </div>
    <div class="card">
     <img alt="Group of people discussing in an office setting" height="200" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYyQwwWnfQPxH4dsTGi0648BE5la-oe-OfYQ&s" width="300"/>
     <h2>
      พรรค ก่อน
     </h2>
     <p>
      <strong>
       วิสัยทัศน์
      </strong>
     </p>
     <p>
      เน้นการเรียนหนัก สอบยาก แต่ได้ความรู้แน่นปึ๊ก ตัวเน้นทุกวิชา ระบบการเรียนการสอนแบบเข้มข้น ส่งเสริมการแข่งขันอย่างสร้างสรรค์
     </p>
     <button>
      ลงคะแนน
     </button>
    </div>
   </div>
   <button class="middle-button">
    ไม่ประสงค์ลงคะแนน
   </button>
  </div>
 </body>
</html>