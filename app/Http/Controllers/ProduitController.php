<!-- <?php

// namespace App\Http\Controllers;

// use App\Models\Produit;
// use Illuminate\Http\Request;

// class ProduitController extends Controller
// {
//     function filter(Request $result)
//     {


//         $filt = Produit::query();
//         $p="Aucun resultat trouve";



//         if ($result->button) {
//             $search = $result->search;
//             $categorie = $result->categorie;
//             $location = $result->location;
//             $check1 = $result->check1;
//             $check2 = $result->check2;
//             $check3 = $result->check3;
//             $min = $result->min;
//             $max = $result->max;


//             $filt->whereAny(['title', 'description', 'categorie', 'location', 'condition', 'price'], 'LIKE', '%' . $search . '%');
          
//             if ($categorie != 'categorie') {

//                 $filt->where('categorie', $categorie);
//             } 
              

//             if ($location != 'location') {

//                 $filt->where('location', $location);
//             }

//             if (!is_null($min) && !is_null($max)) {

//                 $filt->whereBetween('price', [$min, $max]);
//             }

//             if (!is_null($max)) {

//                 $filt->where('price', '>=', $max);
//             }
//             if (!is_null($min)) {

//              $filt->where('price', '>=', $min);
//             }


//             if (!is_null($check1)) {

//                 $filt->where('condition', $check1);
//             }

//             if (!is_null($check2)) {

//                 $filt->where('condition', $check2);
//             }

//             if (!is_null($check3)) {

//                 $filt->where('condition', $check3);
//             } 






            //     if (!is_null($search) && $categorie!='categorie' && $location!='location' && !is_null($dr) && !is_null($min) && !is_null($max)) {

            //         $filt->whereAny(['title', 'description'], 'LIKE', '%' . $search . '%')
            //             ->where('categorie', $categorie)
            //             ->where('location', $location)
            //             ->where('condition', $dr)
            //             ->whereBetween('price', [$min, $max]);
            //     } elseif (!is_null($search) && $categorie!='categorie' && $location!='location' && !is_null($dr) && !is_null($min)) {

            //         $filt->whereAny(['title', 'description'], 'LIKE', '%' . $search . '%')
            //             ->where('categorie', $categorie)
            //             ->where('location', $location)
            //             ->where('condition', $dr)
            //             ->where('price', 'LIKE', $min);

            //     } elseif (!is_null($search) && $categorie!='categorie' && $location!='location' && !is_null($dr) && !is_null($max)) {

            //         $filt->whereAny(['title', 'description'], 'LIKE', '%' . $search . '%')
            //             ->where('categorie', $categorie)
            //             ->where('location', $location)
            //             ->where('condition', $dr)
            //             ->whereBetween('price', 'LIKE', $max);
            //     } elseif (!is_null($search) && $categorie!='categorie' && $location!='location' && !is_null($dr)) {

            //         $filt->whereAny(['title', 'description'], 'LIKE', '%' . $search . '%')
            //             ->where('categorie', $categorie)
            //             ->where('location', $location)
            //             ->where('condition', $dr);
            //     } elseif (!is_null($search) && $categorie!='categorie' && $location!='location') {
            //         $filt->whereAny(['title', 'description'], 'LIKE', '%' . $search . '%')
            //             ->where('categorie', $categorie)
            //             ->where('location', $location);

            //     } elseif (!is_null($search) && $categorie!='categorie') {
            //         $filt->whereAny(['title', 'description'], 'LIKE', '%' . $search . '%')
            //         ->where('categorie', $categorie);
            //     } 
            //     elseif (!is_null($search)) {

            //         $filt->whereAny(['title', 'description', 'categorie', 'location', 'price'], 'LIKE', '%' . $search . '%');
            //     }
            //     elseif ($categorie!='categorie' && $location!='location' && !is_null($dr) && !is_null($min) && !is_null($max)) {

            //         $filt->where('categorie', $categorie)
            //             ->where('location', $location)
            //             ->where('condition', $dr)
            //             ->whereBetween('price', [$min, $max]);
            //     } else
            //     } elseif ($location!='location' && !is_null($dr) && !is_null($min) && !is_null($max)) {

            //         $filt->where('location', $location)
            //             ->where('condition', $dr)
            //             ->whereBetween('price', [$min, $max]);

            //     } else

            //     } elseif (!is_null($dr) && !is_null($min) && !is_null($max)) {

            //         $filt->where('condition', $dr)
            //             ->whereBetween('price', [$min, $max]);
            //     } elseif (!is_null($dr)) {

            //         $filt->where('condition', $dr);
            //     } elseif (!is_null($min) && !is_null($max)) {

            //         $filt->whereBetween('price', [$min, $max]);
            //     } elseif (!is_null($min)) {

            //         $filt->where('price', '>=', $min);
            //     } elseif (!is_null($max)) {

            //         $filt->where('price', '>=', $max);
            //     }

            // }
//         }

      
//         if(!empty($filt)){

//             return view("product", [
//                 'prod'=>$filt->latest()->get(),
                
//             ]);
//         }
//         else{
//             return view("welcome");
//         }
        
//     }

// } 
