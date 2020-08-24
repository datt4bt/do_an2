<?php

namespace App\Imports;

use App\Models\SinhVien;
use App\Models\Lop;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SinhVienImport implements ToModel, WithHeadingRow
{
    private $rows = 0;

   
    
   
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row['nganh_hoc']=='Lập trình viên')
        { 
            ++$this->rows;
        }
      
        
      
        foreach ($row as $key => $value) {
            if (empty($value)) {
               unset($row[$key]);
            }
        }
        if(empty($row)){
            return;
        }
        
       
        $ten   = $row['ho_ten'];
        $ngay_sinh = $this->convertToDate($row['ngay_sinh']);
        $gioi_tinh = $this->getGioiTinh($row['gioi_tinh']);
        $sdt    = $row['sdt'];
        $dia_chi    = $row['dia_chi'];
        $nganh_hoc    = $row['nganh_hoc'];
        $max=SinhVien::max('ma');
		$ma_sv=$max+1;
       // return new SinhVien([
          //  'ma'       => $ma_sv,
          // 'ten'       => $ten,
          // 'gioi_tinh' => $gioi_tinh,
          // 'ngay_sinh' => $ngay_sinh,
           // 'sdt' => $sdt,
          // 'dia_chi' => $dia_chi,
           // 'email'     => $row['email'] ?? '',
            //'ma_lop'    => 1,
       // ]);
        
    }
    
    protected function convertToDate($ngay_sinh){
        return date_format(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($ngay_sinh),'Y-m-d');
    }
    protected function getGioiTinh($gioi_tinh){
        return ($gioi_tinh=='Nam') ? 1 : 0;

    }
    public function getRowCount(): int
    {
        $so_sv=$this->rows;
        $so_lop=($so_sv/20)+1;
        $max_ma=Lop::max('ma');
        for ($i=1; $i <= $so_lop ; $i++) { 
          
		
            $lop = new Lop();
            $stt=$max_ma + 1;
			$lop->ma = $stt ;
			
				$lop->ten = "LT$stt";
			
			
			
			
            $lop->ma_nganh_hoc = 1;
            $lop->ma_khoa_hoc = 1;
			
			$lop->save();
        }
        return $stt;
       
        
    }
    

}
