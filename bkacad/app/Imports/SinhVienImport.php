<?php

namespace App\Imports;

use App\Models\SinhVien;
use App\Models\Khoa;
use App\Models\NganhHoc;
use App\Models\Lop;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SinhVienImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       

       
      
        
      
        foreach ($row as $key => $value) {
            if (empty($value)) {
               unset($row[$key]);
            }
        }
        if(empty($row)){
            return;
        }
        
       
        $ten   = $row['ho_ten'];
        $gioi_tinh = $this->getGioiTinh($row['gioi_tinh']);
        $ngay_sinh = $this->convertToDate($row['ngay_sinh']);
        $sdt    = $row['sdt'];
        $dia_chi    = $row['dia_chi'];
       
       
        $ma_sv=SinhVien::max('ma');
        $max_ma_sv=$ma_sv+1;
        //
        $ma_khoa    = Khoa::firstOrCreate(['ten' => $row['khoa']])->ma;
        $ma_nganh    = NganhHoc::firstOrCreate(['ten' => $row['nganh_hoc']])->ma;
        $ma_lop   = Lop::firstOrCreate(['ten' => $row['lop'],'ma_nganh_hoc' => $ma_nganh,'ma_khoa_hoc' => $ma_khoa])->ma;
        
        //
       
       return new SinhVien([
       'ma'       => $max_ma_sv,
        'ten'       => $ten,
        'gioi_tinh' => $gioi_tinh,
        'ngay_sinh' => $ngay_sinh,
        'sdt' => '0'.$sdt,
        'dia_chi' => $dia_chi,
        'email'     => $row['email']?? null,
        'ma_lop'    => $ma_lop,
        ]);
        
    }
    
    protected function convertToDate($ngay_sinh){
        return date_format(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($ngay_sinh),'Y-m-d');
    }
    protected function getGioiTinh($gioi_tinh){
        return ($gioi_tinh=='Nam') ? 1 : 0;

    }
    
       
        
    
    

}
