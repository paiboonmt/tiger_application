<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use PDOException;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = DB::table('member')
            ->join('products', 'member.package', '=', 'products.id')
            ->where('member.status_code', '=', 4)
            ->whereDate('member.exp_date', '>=', Carbon::today()->toDateString())
            ->select('member.*', 'products.product_name')
            ->orderBy('member.id', 'desc')
            ->limit(5)
            ->get();

        foreach ($customers as $customer) {
            $expDate = \Carbon\Carbon::parse($customer->exp_date);
            $today = \Carbon\Carbon::today();
            $customer->days_left = $today->diffInDays($expDate, false);
        }
        // dd($customers);

        // use function box
        $box = box();

        // New member
        $newMeber = newMember();

        return view('customers.index', ['customers' => $customers, 'box' => $box, 'newMember' => $newMeber]);
    }

    public function expired()
    {
        $customers = DB::table('member')
            ->join('products', 'member.package', '=', 'products.id')
            ->where('member.status_code', '=', 4)
            ->whereDate('member.exp_date', '<=', Carbon::today()->toDateString())
            ->select('member.*', 'products.product_name')
            ->limit(10)
            ->orderBy('member.id', 'desc')
            ->get();

        foreach ($customers as $customer) {
            $expDate = \Carbon\Carbon::parse($customer->exp_date);
            $today = \Carbon\Carbon::today();
            $customer->days_left = $today->diffInDays($expDate, false);
        }

        return view('customers.expired', ['customers' => $customers]);
    }

    public function profile($id)
    {
        $member = DB::table('member')
            ->where('id', $id)
            ->first();

        if ($member && $member->exp_date) {
            $expDate = \Carbon\Carbon::parse($member->exp_date);
            $today = \Carbon\Carbon::today();
            $member->days_left = $today->diffInDays($expDate, false);
        } else {
            $member->days_left = null;
        }

        // Join with products table to get product_name
        $product = DB::table('products')
            ->where('id', $member->package)
            ->first();

        $timeLine = DB::table('tb_time')
            ->where('ref_m_card', $member->m_card)
            ->orderBy('time_id', 'desc')
            ->get();

        $file = DB::table('tb_files')
            ->where('product_id', $member->id)
            ->get();

        return view(
            'customers.profile',
            [
                'member' => $member,
                'product' => $product,
                'timeLine' => $timeLine,
                'file' => $file,
            ]
        );
    }

    public function profile_active($id)
    {
        $member = DB::table('member')
            ->where('id', $id)
            ->first();

        if ($member && $member->exp_date) {
            $expDate = \Carbon\Carbon::parse($member->exp_date);
            $today = \Carbon\Carbon::today();
            $member->days_left = $today->diffInDays($expDate, false);
        } else {
            $member->days_left = null;
        }

        // Join with products table to get product_name
        $product = DB::table('products')
            ->where('id', $member->package)
            ->first();

        $timeLine = DB::table('tb_time')
            ->where('ref_m_card', $member->m_card)
            ->orderBy('time_id', 'desc')
            ->get();

        $file = DB::table('tb_files')
            ->where('product_id', $member->id)
            ->get();

        return view(
            'customers.profile_active',
            [
                'member' => $member,
                'product' => $product,
                'timeLine' => $timeLine,
                'file' => $file,
            ]
        );
    }

    public function profile_expired($id)
    {
        $member = DB::table('member')
            ->where('id', $id)
            ->first();

        if ($member && $member->exp_date) {
            $expDate = \Carbon\Carbon::parse($member->exp_date);
            $today = \Carbon\Carbon::today();
            $member->days_left = $today->diffInDays($expDate, false);
        } else {
            $member->days_left = null;
        }

        // Join with products table to get product_name
        $product = DB::table('products')
            ->where('id', $member->package)
            ->first();

        $timeLine = DB::table('tb_time')
            ->where('ref_m_card', $member->m_card)
            ->orderBy('time_id', 'desc')
            ->get();

        $file = DB::table('tb_files')
            ->where('product_id', $member->id)
            ->get();

        return view(
            'customers.profile_active',
            [
                'member' => $member,
                'product' => $product,
                'timeLine' => $timeLine,
                'file' => $file,
            ]
        );
    }

    public function create()
    {
        // Getall nationality
        $nationality_data = DB::table('tb_nationality')->get();
        // Getall package
        $product_data = DB::table('products')->get();
        return view('customers.create', ['nationality_data' => $nationality_data, 'product_data' => $product_data]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'group' => 'required',
            'gender' => 'required',
            'fname' => 'required',
            'nationality' => 'required',
            'phone' => 'required',
            'm_card' => 'required',
            'p_visa' => 'required',
            'email' => 'required',
            'product' => 'required',
            'accom' => '',
            'comment' => '',
            'sta_date' => 'required',
            'exp_date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        // อัปโหลดรูปภาพ
        $file = $request->file('image');
        $filename = Str::ulid() . '.webp';
        $dir = storage_path('image/customer/img');
        $path = $dir . '/' . $filename;

        // สร้างโฟลเดอร์ถ้ายังไม่มี
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        // ย่อขนาด + แปลงเป็น webp (แทน $file->move())
        $this->resizeImage($file->getPathname(), $path, 1200, 75);

        // เพิ่มลงฐานข้อมูล member
        try {
            DB::table('group_type')->insert([
                'group_id' => 1,
                'created_at' => Carbon::now('Asia/Bangkok'),
                'updated_at' => Carbon::now('Asia/Bangkok')
            ]);

            $data = [
                'group'          => 1,
                'm_card'         => $request->m_card,
                'p_visa'         => $request->p_visa,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'sex'            => $request->gender,
                'fname'          => $request->fname,
                'price'          => $request->price ?? 0,
                'pay'            => $request->pay ?? 0,
                'fightname'      => $request->fightname ?? '',
                'nationalty'     => $request->nationality,
                'birthday'       => $request->birthday ?? '',
                'age'            => $request->age ?? '',
                'discount'       => $request->discount ?? 0,
                'vat7'           => $request->vat7 ?? 0,
                'vat3'           => $request->vat3 ?? 0,
                'total'          => $request->total ?? 0,
                'package'        => $request->product,
                'dropin'         => (int) ($request->dropin ?? 0),
                'new_package'    => $request->new_package ?? '',
                'height'         => $request->height ?? '',
                'weigh'          => $request->weigh ?? '',
                'accom'          => $request->accom ?? '',
                'payment'        => $request->payment ?? '',
                'invoice'        => $request->invoice ?? '',
                'vaccine'        => $request->vaccine ?? '',
                'comment'        => $request->comment ?? '',
                'emergency'      => trim(($request->emergency ?? '') . ' ' . ($request->em_phone ?? '')),
                'sta_date'       => $request->sta_date,
                'exp_date'       => $request->exp_date,
                'expired'        => $request->expired ?? '',
                'tenure'         => $request->tenure ?? '',
                'type_training'  => $request->type_training ?? '',
                'type_fighter'   => $request->type_fighter ?? '',
                'sponsored'      => $request->sponsored ?? '',
                'commission'     => $request->commission ?? '',
                'mealplan_month' => $request->mealplan_month ?? '',
                'affiliate'      => $request->affiliate ?? '',
                'facebook'       => $request->facebook ?? '',
                'instagram'      => $request->instagram ?? '',
                'status'         => $request->status ?? '',
                'image'          => $filename,
                'AddBy'          => Auth::user()->name ?? '',
                'code'           => (int) ($request->code ?? 0),
                'status_code'    => 4, // 4 = ลูกค้า (ใช้ใน index/dashboard)
                // 'date' ใช้ค่า default CURRENT_TIMESTAMP ของตาราง
            ];
            $this->insertData($data);

            $mass = 'เพื่มข้อมูลเรียบร้อย';
            return redirect()->back()->with('success',$mass);
        } catch (PDOException $e) {
            return redirect()->back()->withErrors(['error' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล: ' . $e->getMessage()]);
        }
    }

    // Funtion
    private function resizeImage(string $src, string $dest, int $maxWidth = 1200, int $quality = 75): void
    {
        $info = getimagesize($src);
        $mime = $info['mime'];

        switch ($mime) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($src);
                break;
            case 'image/png':
                $image = imagecreatefrompng($src);
                break;
            case 'image/webp':
                $image = imagecreatefromwebp($src);
                break;
            default:
                throw new \Exception('ไม่รองรับไฟล์ชนิดนี้: ' . $mime);
        }

        $width = imagesx($image);
        $height = imagesy($image);

        // ย่อเฉพาะภาพที่กว้างเกิน maxWidth, รักษาสัดส่วน
        if ($width > $maxWidth) {
            $newWidth = $maxWidth;
            $newHeight = (int) round($height * ($maxWidth / $width));
        } else {
            $newWidth = $width;
            $newHeight = $height;
        }

        $resized = imagecreatetruecolor($newWidth, $newHeight);

        // รักษาความโปร่งใส (png/webp)
        imagealphablending($resized, false);
        imagesavealpha($resized, true);

        imagecopyresampled(
            $resized,
            $image,
            0,
            0,
            0,
            0,
            $newWidth,
            $newHeight,
            $width,
            $height
        );

        imagewebp($resized, $dest, $quality);

        imagedestroy($image);
        imagedestroy($resized);
    }
    private function insertData(array $data): int
    {
        // เพิ่มข้อมูลลงตาราง member และคืนค่า id ที่เพิ่ม
        return DB::table('member')->insertGetId($data);
    }
}

function box()
{ // นับจำนวนสมาชิกลูกค้า
    $countMember = DB::table('member')
        ->where('member.status_code', '=', 4)
        ->whereDate('member.exp_date', '>=', Carbon::today()->toDateString())
        ->select('member.id')
        ->count();
    return ($countMember);
}

function newMember()
{
    return 100;
}
