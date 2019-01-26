<?php 
class RenderCodeTable{
    // $content_main là cột nội dung chính
    // $start là STT bắt đầu của hàng
    // $end là STT cuối của hàng
    function render($content_main,$start,$end,$arr_details,$arr){
        $rowspan = $end-$start+1;
        // echo $rowspan;
        // Vòng lặp để tìm số lượng hàng trong cột nội dung chính 
        // Hơi gồm 3 mục chi tiết con, nên lặp 3 lần
        for($i=$start; $i < $end+1; $i++){
            $key = strval($i)."-1"; // Thiết lập key 1-1, 2-1, 3-1 theo mỗi lần lặp
            // echo $key;
            if($arr[$key]==0){
                // Kiểm tra xem nếu mục chi tiết con mà không có điểm, thì giảm số lượng hàng trong cột nội dung chính
                $rowspan--; // Là số lượng hàng trong cột hơi
                // echo $rowspan;
            }
        }

        $count = 1;// Biến đếm
        for($i=$start; $i < $end+1; $i++){
            $key = strval($i)."-1";  // Thiết lập key 1-1, 2-1, 3-1 theo mỗi lần lặp
            if($arr[$key]!=0){// Nếu có điểm
            $key2 = strval($i)."-2"; // Thiết lập key 1-2, 1-3, 2-2 ,2-3
            $key3 = strval($i)."-3";
            if($count == 1){// Nếu là cột đầu tiên được in ra, thì có thêm một cột td rowspan
                echo '<tr> <td>'.$i.'</td><td rowspan="'.$rowspan.'">'.$content_main.'</td><td>'.$arr_details[$i].'</td><td><input type="number" value="'.$arr[$key].'" disabled></td> <td><input type="number" value="'.$arr[$key2].'" disabled></td> <td><input type="text" value="'.$arr[$key3].'" disabled></td></tr>';
            }else{// Còn là cột thứ 2 hoặc 3, thì không có td rowspan
                echo '<tr> <td>'.$i.'</td><td>'.$arr_details[$i].'</td><td><input type="number" value="'.$arr[$key].'" disabled></td> <td><input type="number" value="'.$arr[$key2].'" disabled></td> <td><input type="text" value="'.$arr[$key3].'" disabled></td></tr>';
            }
                $count++;
            }   
        }
    }
}