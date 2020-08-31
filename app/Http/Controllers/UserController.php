<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPassword;
use App\Models\Product;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
class UserController extends Controller
{
	/**
	 * show tong quan user
	 */
    public function index()
	{
		$user = User::find(get_data_user('web'));

		$transactions 		  = Transaction::where('tr_user_id',get_data_user('web'));
		$listTransactions 	  = $transactions;
		
		$transactions = $transactions->addSelect('id','tr_total','tr_address','tr_phone','created_at','tr_status','tr_user_id','tr_user_name','tr_type','tr_sta','tr_codeship')->paginate(10);
		$totalTransaction     = $listTransactions->select('id')->count();
		$totalTransactionDone = $listTransactions->where('tr_status',Transaction::STATUS_DONE)
								->select('id')
								->count();
		
		$viewData = [
			'totalTransaction'	   => $totalTransaction,
			'totalTransactionDone' => $totalTransactionDone,
			'transactions'	       => $transactions,
			'user'				   => $user,
		];
		
		return view('user.index',$viewData);
	}
	
	public function viewOrder(Request $request,$id)
    {
        if ($request->ajax())
        {
            $orders = Order::with('product')
                ->where('or_transaction_id',$id)->get();
            $transactions = Transaction::find($id)->get();
            $html = view('user.order',compact('orders','transactions'))->render();
            return \response()->json($html);
        }
    }

	public function updateInfo()
	{
		$user = User::find(get_data_user('web'));
		return view('user.info',compact('user'));
	}
	
	/**
	 * luu thong tin
	 */
	public function saveUpdateInfo(Request $request)
	{
		User::where('id',get_data_user('web'))
			->update($request->except('_token')) ;
		
		return redirect()->back()->with('success','Cập nhật thông tin thành công');
	}
	
	public function updatePassword()
	{
		return view('user.password');
	}
	
	public function saveUpdatePassword(RequestPassword $requestPassword)
	{
		if (Hash::check($requestPassword->password_old,get_data_user('web','password')))
		{
			$user = User::find(get_data_user('web'));
			$user->password = bcrypt($requestPassword->password);
			$user->save();
			
			return redirect()->back()->with('success','Cập nhật thành công');
		}
		
		return redirect()->back()->with('danger','Mật khẩu cũ không đúng');
	}

	public function viewTransaction()
	{
		$transactions 		  = Transaction::where('tr_user_id',get_data_user('web'));
		$listTransactions 	  = $transactions;
		
		$transactions = $transactions->addSelect('id','tr_total','tr_address','tr_phone','created_at','tr_status','tr_user_id','tr_user_name','tr_type','tr_sta','tr_codeship','tr_shipper')->paginate(10);
		$viewData = [
			
			'transactions'	       => $transactions,
			
		];
		return view('user.transaction',$viewData);

	}
	
	public function getProductPay()
	{
		$products = Product::orderBy('pro_pay','DESC')->limit(10)->get();
		return view('user.product',compact('products'));
	}
	
}
