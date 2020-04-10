<?php

namespace App\Http\Controllers;


use App\Banner;
use App\Profile;
use App\Recommend;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class AdminPageController extends Controller
{
    //
    /**
     * @param string $opname
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showIndex($opname){
        //dd(Auth::user());
        if(!Auth::check()){
            return redirect('/login');
        }
        $users = User::get();
        $banners = Banner::get();
        $recommends = Recommend::get();
        $profile = Profile::first()->toArray();
        return view('admin.index',['opname'=>$opname,'users'=>$users,'banners'=>$banners,'recommends'=>$recommends,'profile'=>$profile]);
    }

    public function store($opname,Request $res){
        if(!Auth::check()){
            return redirect('/login');
        }
        //dd($res);
        $res->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'password_confirmation' => 'required|max:255',
        ]);
        $resarr = $res->except("_token");
        if($resarr['password']!==$resarr['password_confirmation']){
            return back()->with('passerrors','密码不一致');
        }
        //dd($resarr);
        $fileCharater = $res->file('imgurl');
        if($fileCharater){
            //获取文件的扩展名
            $kuoname=$fileCharater->getClientOriginalExtension();
            //要保存的文件名 时间+扩展名
            $newname=['imgurl'=>date('Ymd') . uniqid() .'.'.$kuoname];
            $uploadrs = $this->uploads($res,$newname,$fileCharater);
            //设置新增banner图片url地址  如果是上传成功则直接赋值新图片的文件名称，如果上传失败的则赋值为上传失败说明
            $uploadrs['imgurl']=='上传成功'?$resarr['imgurl']=$newname['imgurl']:$resarr['imgurl']=$uploadrs['imgurl'];
            //dd($resarr);
        }

        if($opname=='user'){
            $rs = User::create($resarr);
            if($rs){
                return redirect('admin/'.$opname);
            };
        }
        if($opname=='banner'){
            //创建新的banner数据
            $rs = Banner::create($resarr);
            if($rs){
                return redirect('admin/'.$opname);
            };
        }
        if($opname=='home'){
            //dd('home');
            $rs = Recommend::create($resarr);
            if($rs){
                return redirect('admin/'.$opname);
            };
        }

    }

    /**
     * @param $opname
     * @param $id
     * @param Request $res
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($opname, $id, Request $res){
        if(!Auth::check()){
            return redirect('/login');
        }
        $editarr = $res->except('_token');
        $editarr = array_filter($editarr,function ($v){if($v=='' || $v=NULL){return false;}else{return true;}});
        $fileCharater = $res->file('imgurl');
        //dd($fileCharater);
        //上传图片，设置图片地址（文件名称）
        if($fileCharater){
            //获取文件的扩展名
            $kuoname=$fileCharater->getClientOriginalExtension();
            //要保存的文件名 时间+扩展名
            $newname=['imgurl'=>date('Ymd') . uniqid() .'.'.$kuoname];
            $uploadrs = $this->uploads($res,$newname,$fileCharater);
            //设置新增banner图片url地址  如果是上传成功则直接赋值新图片的文件名称，如果上传失败的则赋值为上传失败说明
            $uploadrs['imgurl']=='上传成功'?$editarr['imgurl']=$newname['imgurl']:$editarr['imgurl']=$uploadrs['imgurl'];
        }

        if($opname=='user'){
            //dd($editarr);
            $res->validate([
                'name' => 'required|unique:users,name,'.$res->id.'|max:255',
                'email' => 'required|unique:users,email,'.$res->id.'|max:255',
            ]);

            if(isset($editarr['password'])){
                $editarr['password'] = Hash::make($editarr['password']);
            }

            if(User::where(['id'=>$id])->update($editarr)){
                return redirect('admin/'.$opname);
            }
        }
        if($opname=='banner'){
            //dd($editarr);
            //创建新的banner数据
            if(Banner::where(['id'=>$id])->update($editarr)){
                return redirect('admin/'.$opname);
            }
        }
        if($opname=='home'){
            if(Recommend::where(['id'=>$id])->update($editarr)){
                return redirect('admin/'.$opname);
            }
        }
        if($opname=='profile'){
            // 过滤空字符串


            if(Profile::where(['id'=>$id])->update($editarr)){
                $rsmsg = [];
                $newnames = [];
                if(isset($editarr['wximgurl'])){
                    $newnames[] = ['wximgurl'=>'wxqrcode.jpg'];
                }
                if(isset($editarr['qqimgurl'])){
                    $newnames[] = ['qqimgurl'=>'qqqrcode.jpg'];
                }
                if(isset($editarr['mapurl'])){
                    $newnames[] = ['mapurl'=>'map.jpg'];
                }
                if(isset($editarr['imgurl'])){
                    $newnames[] = ['imgurl'=>'company.jpg'];
                }


                foreach ($newnames as $newname){
                    //获取文件资源
                    $fileCharater = $res->file(array_keys($newname));
                    $rsmsg = array_merge($rsmsg,$this->uploads($res,$newname,$fileCharater));
                }
                $users = User::get();
                $banners = Banner::get();
                $recommends = Recommend::get();
                $profile = Profile::first()->toArray();
                return view('admin.index',['opname'=>$opname,'users'=>$users,'banners'=>$banners,'recommends'=>$recommends,'profile'=>$profile,'rsmsg'=>$rsmsg]);
            }
        }
    }
    public function del($opname,$id){
        if(!Auth::check()){
            return redirect('/login');
        }
        if($opname=='user'){
            if(User::where(['id'=>$id])->delete()){
                return redirect('admin/'.$opname);
            }
        }
        if($opname=='banner'){
            $banners = Banner::where(['id'=>$id])->first()->toArray();
            //dd($banners);
            if(Banner::where(['id'=>$id])->delete()){
                //$bool = Storage::disk('local')->delete($banners['imgurl']);
                $bool = Storage::delete($banners['imgurl']);
                //dd($bool);
                return redirect('admin/'.$opname);
            }
        }
        if($opname=='home'){
            $cars = Recommend::where(['id'=>$id])->first()->toArray();
            if(Recommend::where(['id'=>$id])->delete()){
                $bool = Storage::delete($cars['imgurl']);
                return redirect('admin/'.$opname);
            }
        }

    }

    public function uploads($res,$newname,$fileCharater){
        if(!Auth::check()){
            return redirect('/login');
        }
        $PictureTypeAllow = ['image/jpeg', 'image/jpg'];
        $pictureMaxSize = 4; //单位m
        if($fileCharater->isValid()){
            //获取文件的扩展名
            $exc =$fileCharater->getMimeType();
            $size = $fileCharater->getSize();
            $newname_k = array_key_first($newname);
            //判断大小
            if ($size > $pictureMaxSize * 1024 * 1024) {
                return $param =[$newname_k=>'上传失败，图片不能大于4M'];
            }
            //判断图片类型
            if (array_search($exc, $PictureTypeAllow) === false) {
                return $param = [$newname_k=>'上传失败，图片必须是jpg格式'];
            }
            //获取文件真实路径
            $path=$fileCharater->getRealPath();
            $bool= Storage::disk('local')->put($newname[$newname_k],file_get_contents($path));
            return $param = [$newname_k=>'上传成功'];
        }

    }


}
