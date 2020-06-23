<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\OrdersProduct;

class ExportController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;

    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
    	$this->from = $from;
    	$this->to = $to;
    }

    public function collection()
    {
    	// $date = date('Y-m-d H:i:s');
     //    $newdate = strtotime ( '-1 month' , strtotime ( $date ) ) ;
     //    $newdate = date ( 'Y-m-d H:i:s' , $newdate );

        $orders = OrdersProduct::whereBetween('created_at', [$this->from, $this->to])->get();

        foreach ($orders as $row) {
            $order[] = array(
                '0' => $row->id,
                '1' => $row->product_name,
                '2' => $row->product_price,
                '3' => $row->product_quantity,
                '4' => $row->created_at,
                '5' => number_format($row->product_price * $row->product_quantity),

            );
        }
        	array_push($order[0], $this->from);
        	array_push($order[0], $this->to);

        return (collect($order));
    }

    public function headings(): array
    {
        return [
            'id',
            'Name product',
            'Price',
            'Quantity',
            'Date order',
            'Total price',
            'Date from',
            'Date to',
        ];
    }
}
