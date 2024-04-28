<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Route Search</title>
    <!-- Link CSS Files -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="loader.css">
    <link rel="stylesheet" href="fonts.css">

    <style>
    @keyframes moveRightToLeft {
      0% { transform: translateX(100%); }
      100% { transform: translateX(-100%); }
    }

    .moving-line {
      position: relative;
      overflow: hidden;
      white-space: nowrap;
      
      
    }

    .moving-line span {
      display: inline-block;
      animation: moveRightToLeft 5s linear infinite;
      color: aliceblue;
    }
  </style>
</head>
<body>

<div class="info">
            <img src="5.png" alt="" width="35px" height="35px">
        </div>
    <div class="container">
        
        <div class="icon">
            <img src="11.png" alt="Icon">
        </div><br><br>
        <h1>ভাড়া নিবেন?</h1> <!-- This text will be displayed in YourBengaliFont -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="from"><b>---From---</b></label>
            <select name="from" id="from" required>
                <option value="">Select From</option>
                <option value="ইসিবি চত্তর">ইসিবি চত্তর</option>
               <option value="কালশীমোড়">কালশীমোড়</option>
               <option value="কুড়িল বিশ্বরোড"> কুড়িল বিশ্বরোড</option>
               <option value="গাবতলী">গাবতলী</option>
               <option value="টেকনিক্যাল">টেকনিক্যাল</option>
              <option value="হেমায়েতপুর"> হেমায়েতপুর</option>
             <option value="মিরপুর-১"> মিরপুর-১</option>
             <option value="মিরপুর-২">মিরপুর-২</option>
              <option value="মিরপুর-৬">মিরপুর-৬</option>
              <option value="মিরপুর-১১"> মিরপুর-১১</option>
              <option value="মেরাদিয়া বাজার"> মেরাদিয়া বাজার</option>
              <option value="রামপুরা"> রামপুরা</option>
               <option value="বনশ্রী">বনশ্রী</option>
               <option value="স্টাফ কোয়াটার">স্টাফ কোয়াটার</option>
 

                <!-- Add more options as needed -->
            </select>
            <label for="to"><b>---To---</b></label>
            <select name="to" id="to" required>
                <option value="">Select To</option>
                
                <option value="ইসিবি চত্বর">ইসিবি চত্বর</option>
               <option value="কালশীমোড়">কালশীমোড়</option>
               <option value="কুড়িল বিশ্বরোড"> কুড়িল বিশ্বরোড</option>
               <option value="গাবতলী">গাবতলী</option>
               <option value="টেকনিক্যাল">টেকনিক্যাল</option>
              <option value="হেমায়েতপুর"> হেমায়েতপুর</option>
             <option value="মিরপুর-১"> মিরপুর-১</option>
             <option value="মিরপুর-২">মিরপুর-২</option>
              <option value="মিরপুর-৬">মিরপুর-৬</option>
              <option value="মিরপুর-১১"> মিরপুর-১১</option>
              <option value="মেরাদিয়া বাজার"> মেরাদিয়া বাজার</option>
              <option value="রামপুরা"> রামপুরা</option>
               <option value="বনশ্রী">বনশ্রী</option>
               <option value="স্টাফ কোয়াটার">স্টাফ কোয়াটার</option>

                <!-- Add more options as needed -->
            </select>
            <button type="submit" onclick="showLoading()">Search</button>
        </form>
    </div>

    <!-- Loader Animation -->
    <div class="loader-container" id="loader-container">
        <div class="loader"></div>
    </div>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php
            $routes = [

                // গাবতলী//
                "গাবতলী to হেমায়েতপুর" => [
                             ["bus_name" => " আছিম পরিবহন", "fare" => 15],
                             ["bus_name" => "Bus B", "fare" => 12]
                            ],
                "গাবতলী to টেকনিক্যাল" => [["bus_name" => "আছিম পরিবহন", "fare" => 10], 
                             ["bus_name" => "Bus Y", "fare" => 16]
                            ],

                "গাবতলী to মিরপুর-১" => [["bus_name" => "আছিম পরিবহন", "fare" => 10], 
                             ["bus_name" => "Bus Y", "fare" => 16]
                            ],     
                "গাবতলী to মিরপুর-২" => [["bus_name" => "আছিম পরিবহন", "fare" => 10], 
                            ["bus_name" => "Bus Y", "fare" => 16]
                            ],  
                "গাবতলী to মিরপুর-৬" => [
                                ["bus_name" => " আছিম পরিবহন", "fare" => 13],
                                ["bus_name" => "Bus B", "fare" => 12]
                               ],
               "গাবতলী to মিরপুর-১১" => [
                                ["bus_name" => "আছিম পরিবহন", "fare" => 16], 
                                ["bus_name" => "Bus Y", "fare" => 16]
                               ],
   
              "গাবতলী to কালশীমোড়" => [
                                ["bus_name" => "আছিম পরিবহন", "fare" => 24], 
                                ["bus_name" => "Bus Y", "fare" => 16]
                               ],     
              "গাবতলী to ইসিবি চত্বর" => [
                               ["bus_name" => "আছিম পরিবহন", "fare" =>28], 
                               ["bus_name" => "Bus Y", "fare" => 16]
                               ],    
              "গাবতলী to কুড়িল বিশ্বরোড" => [
                               ["bus_name" => "আছিম পরিবহন", "fare" => 34], 
                               ["bus_name" => "Bus Y", "fare" => 16]
                               ],  
             "গাবতলী to রামপুরা" => [
                                   ["bus_name" => " আছিম পরিবহন", "fare" => 49],
                                   ["bus_name" => "Bus B", "fare" => 12]
                                  ],
              "গাবতলী to বনশ্রী" => [
                                   ["bus_name" => "আছিম পরিবহন", "fare" => 51], 
                                   ["bus_name" => "Bus Y", "fare" => 16]
                                  ],
      
            "গাবতলী to মেরাদিয়া বাজার" => [
                                   ["bus_name" => "আছিম পরিবহন", "fare" => 55], 
                                   ["bus_name" => "Bus Y", "fare" => 16]
                                  ],     
             "গাবতলী to স্টাফ কোয়াটার" => [
                                  ["bus_name" => "আছিম পরিবহন", "fare" =>68], 
                                  ["bus_name" => "Bus Y", "fare" => 16]
                                  ],                                       
  
                                
                // টেকনিক্যাল//    
                
       "টেকনিক্যাল to হেমায়েতপুর" => [
                    ["bus_name" => " আছিম পরিবহন", "fare" => 19],
                    ["bus_name" => "Bus B", "fare" => 12]
                   ],
       "টেকনিক্যাল to গাবতলী" => [["bus_name" => "আছিম পরিবহন", "fare" => 10], 
                    ["bus_name" => "Bus Y", "fare" => 16]
                   ],

       "টেকনিক্যাল to মিরপুর-১" => [["bus_name" => "আছিম পরিবহন", "fare" => 10], 
                    ["bus_name" => "Bus Y", "fare" => 16]
                   ],     
       "টেকনিক্যাল to মিরপুর-২" => [["bus_name" => "আছিম পরিবহন", "fare" => 10], 
                   ["bus_name" => "Bus Y", "fare" => 16]
                   ],  
       "টেকনিক্যাল to মিরপুর-৬" => [
                       ["bus_name" => " আছিম পরিবহন", "fare" => 10],
                       ["bus_name" => "Bus B", "fare" => 12]
                      ],
      "টেকনিক্যাল to মিরপুর-১১" => [
                       ["bus_name" => "আছিম পরিবহন", "fare" => 13], 
                       ["bus_name" => "Bus Y", "fare" => 16]
                      ],

     "টেকনিক্যাল to কালশীমোড়" => [
                       ["bus_name" => "আছিম পরিবহন", "fare" => 21], 
                       ["bus_name" => "Bus Y", "fare" => 16]
                      ],     
     "টেকনিক্যাল to ইসিবি চত্বর" => [
                      ["bus_name" => "আছিম পরিবহন", "fare" =>25], 
                      ["bus_name" => "Bus Y", "fare" => 16]
                      ],    
     "টেকনিক্যাল to কুড়িল বিশ্বরোড" => [
                      ["bus_name" => "আছিম পরিবহন", "fare" => 30], 
                      ["bus_name" => "Bus Y", "fare" => 16]
                      ],  
    "টেকনিক্যাল to রামপুরা" => [
                          ["bus_name" => " আছিম পরিবহন", "fare" => 45],
                          ["bus_name" => "Bus B", "fare" => 12]
                         ],
     "টেকনিক্যাল to বনশ্রী" => [
                          ["bus_name" => "আছিম পরিবহন", "fare" => 48], 
                          ["bus_name" => "Bus Y", "fare" => 16]
                         ],

   "টেকনিক্যাল to মেরাদিয়া বাজার" => [
                          ["bus_name" => "আছিম পরিবহন", "fare" => 52], 
                          ["bus_name" => "Bus Y", "fare" => 16]
                         ],     
    "টেকনিক্যালto স্টাফ কোয়াটার" => [
                         ["bus_name" => "আছিম পরিবহন", "fare" =>65], 
                         ["bus_name" => "Bus Y", "fare" => 16]
                         ], 
                
         
           // হেমায়েতপুর//  
           
           
   "হেমায়েতপুর to টেকনিক্যাল" => [
            ["bus_name" => " আছিম পরিবহন", "fare" => 19],
            ["bus_name" => "Bus B", "fare" => 12]
           ],
"হেমায়েতপুর to গাবতলী" => [["bus_name" => "আছিম পরিবহন", "fare" => 15], 
            ["bus_name" => "Bus Y", "fare" => 16]
           ],

"হেমায়েতপুর to মিরপুর-১" => [["bus_name" => "আছিম পরিবহন", "fare" => 23], 
            ["bus_name" => "Bus Y", "fare" => 16]
           ],     
"হেমায়েতপুর to মিরপুর-২" => [["bus_name" => "আছিম পরিবহন", "fare" => 25], 
           ["bus_name" => "Bus Y", "fare" => 16]
           ],  
"হেমায়েতপুর to মিরপুর-৬" => [
               ["bus_name" => " আছিম পরিবহন", "fare" => 28],
               ["bus_name" => "Bus B", "fare" => 12]
              ],
"হেমায়েতপুর  to মিরপুর-১১" => [
               ["bus_name" => "আছিম পরিবহন", "fare" => 31], 
               ["bus_name" => "Bus Y", "fare" => 16]
              ],

"হেমায়েতপুর to কালশীমোড়" => [
               ["bus_name" => "আছিম পরিবহন", "fare" => 39], 
               ["bus_name" => "Bus Y", "fare" => 16]
              ],     
"হেমায়েতপুর to ইসিবি চত্বর" => [
              ["bus_name" => "আছিম পরিবহন", "fare" =>43], 
              ["bus_name" => "Bus Y", "fare" => 16]
              ],    
"হেমায়েতপুর to কুড়িল বিশ্বরোড" => [
              ["bus_name" => "আছিম পরিবহন", "fare" => 49], 
              ["bus_name" => "Bus Y", "fare" => 16]
              ],  
"হেমায়েতপুর to রামপুরা" => [
                  ["bus_name" => " আছিম পরিবহন", "fare" => 64],
                  ["bus_name" => "Bus B", "fare" => 12]
                 ],
"হেমায়েতপুর to বনশ্রী" => [
                  ["bus_name" => "আছিম পরিবহন", "fare" => 66], 
                  ["bus_name" => "Bus Y", "fare" => 16]
                 ],

"হেমায়েতপুর to মেরাদিয়া বাজার" => [
                  ["bus_name" => "আছিম পরিবহন", "fare" => 71], 
                  ["bus_name" => "Bus Y", "fare" => 16]
                 ],     
"হেমায়েতপুর to স্টাফ কোয়াটার" => [
                 ["bus_name" => "আছিম পরিবহন", "fare" =>83], 
                 ["bus_name" => "Bus Y", "fare" => 16]
                 ],     
                // Add more routes as needed
            ];
            $from = $_POST['from'];
            $to = $_POST['to'];
            $route_key = $from . ' to ' . $to;

            if (array_key_exists($route_key, $routes)): ?>
                <div class="output-container">
                    <div class="route-title">Route: <?= htmlspecialchars($route_key) ?></div>
                    <?php foreach ($routes[$route_key] as $bus): ?>
                        <div class="output">
                            <div class="bus-info">
                                <p><span class="bold">বাসের নাম:</span> <?= htmlspecialchars($bus['bus_name']) ?></p>
                                <p><span class="bold">ভাড়া:</span> ৳<?= htmlspecialchars($bus['fare']) ?></p>
                                <p><span class="bold">Student ভাড়া:</span> ৳<?= max(10, $bus['fare'] * 0.5) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="output">
                    <p class="error">No bus route found from <?= htmlspecialchars($from) ?> to <?= htmlspecialchars($to) ?>.</p>
                </div>
            <?php endif; ?>
    <?php endif; ?>

    <div class="moving-line">
  <span>সর্বনিম্ন ভাড়া ১০ টাকা হিসেবে সিস্টেমটি ডেভেলপ করা হয়েছে</span>
</div>


    <footer>
        Developed by <strong>ISOLATE</strong> &copy; <?= date("Y") ?>. All rights reserved.
    </footer>

    <script>
        function showLoading() {
            document.getElementById("loader-container").style.display = "flex";
            document.querySelector(".container").style.filter = "blur(5px)"; // Apply blur effect to the background
        }
    </script>
</body>
</html>
