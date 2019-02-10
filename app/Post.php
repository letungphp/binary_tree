<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model
{

	const TBL_POST_CATEGORY = 'post_categorys';
	const TBL_POST 			= 'post';
	const TBL_POST_DATA 	= 'post_datas';
	const TBL_POST_IMAGE 	= 'post_images';
	const TBL_CAT_CAT 		= 'cat_to_cats';
    
    public function get_post_and_category_info(array $post_feilds = ['*'],array $category_feilds = []){


    }


    public function get_post_images($post_id,array $feilds = ['*']){


    }

    public function get_post_datas($post_id,array $feilds = ['*']){

    	
    }

    //if post_id = 0 => create new post
    public function save_post($post_id = 0,array $data){


    }

    //save post data based on post id
    public function save_post_data($post_id,array $data){

    	
    }

    //save post image based on post id
    public function save_post_image($post_id,array $data){

    	
    }

    //Create or update category
    public function save_post_category($cate_id = 0,array $data){

    	
    }
}
