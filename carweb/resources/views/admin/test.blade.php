<?php
return redirect('admin/profile')->with('rsmsg', $rsmsg);
redirect()->route('/');
return redirect('admin/profile');
return redirect()->action('AdminPageController@showIndex','profile');
            $fileCharater = $res->file('wximgurl')->getMimeType();
            dd($fileCharater);
            //$files = $res->file('wximgurl')->store('public/images');
            $destinationPath = 'showpagestyle/images/';      // $destinationPath 重新定义文件存放路径
            $fileCharater->move($destinationPath,'test222.jpg');
            dd($destinationPath.'test.jpg');
            foreach($files as $k){
                print_r($path = $res->file('wximgurl')->store('public/images'));
                echo '<br>';
            }
            dd($files);
            $fileCharater = $res->file('wximgurl')->store('showpagestyle/images');
            $fileCharater = $res->file('wximgurl');
            $destinationPath = 'showpagestyle/images/'; //public 文件夹下面建 storage/uploads 文件夹
            $extension = $fileCharater->getClientOriginalExtension();
            dd($extension);
            $fileName='qrcode.jpg';
            $fileCharater->move($destinationPath,$fileName);
 $fileCharater = $res->file('wximgurl')->getMimeType();  // getMimeType() 获取文件真实后缀名
 $fileCharater = $request->file('wximgurl');      // file() 获取指定文件信息
 $extension = $fileCharater->getClientOriginalExtension();  // getClientOriginalExtension() 获取文件后缀，存在问题是无法检测出伪造的文件名
 $fileCharater = $res->file('wximgurl')->getMimeType();  // getMimeType() 获取文件真实后缀名
 $destinationPath = 'showpagestyle/images/';      // $destinationPath 重新定义文件存放路径
 $fileCharater->move($destinationPath,$fileName);     // move() 移动文件到指定路径
 $filePath = asset($destinationPath.$fileName);       // asset() 该函数返回一个网络URL地址
 $path = $res->file('wximgurl')->storeAs('public', 'test33333');  // 使用storeAs() 设置上传文件名称
            //获取文件的原文件名 包括扩展名
            $yuanname= $wenjian->getClientOriginalName();

            //获取文件的扩展名
            $kuoname=$wenjian->getClientOriginalExtension();

            //获取文件的类型
            $type=$wenjian->getClientMimeType();

            //获取文件的绝对路径，但是获取到的在本地不能打开
            $path=$wenjian->getRealPath();

            //要保存的文件名 时间+扩展名
            $filename=date('Y-m-d') . '/' . uniqid() .'.'.$kuoname;
            //保存文件          配置文件存放文件的名字  ，文件名，路径
            $bool= Storage::disk('uploadimg')->put($filename,file_get_contents($path));
            //return back();
            return json_encode(['status'=>1,'filepath'=>$filename]);
            if ($fileCharater->isValid()) {
                $path = Storage::disk('uploads')->put('',$fileCharater);
                dd($path);
                //获取文件的扩展名
                $ext = $fileCharater->getClientOriginalExtension();

                //获取文件的绝对路径
                $path = $fileCharater->getRealPath();

                //定义文件名
                $filename = date('Y-m-d-h-i-s').'.'.$ext;

                //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
                Storage::disk('public')->put($filename, file_get_contents($path));
            }

            dd($path);