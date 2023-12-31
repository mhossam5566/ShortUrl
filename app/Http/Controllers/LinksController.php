<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Link;
use App\Models\Click;
class LinksController extends Controller
{
  public function index()
  {
    $links_count = Link::count();
    $clicks_count = Click::count();

    return view("home", compact("links_count", "clicks_count"));
  }
  public function generate_random_code($length = 5)
  {
    $characters =
      "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $code = "";
    for ($i = 0; $i < $length; $i++) {
      $code .= $characters[random_int(0, strlen($characters) - 1)];
    }
    return $code;
  }

  public function short(Request $r)
  {
    $validator = Validator::make($r->all(), [
      "longurl" => "required|url",
    ]);

    if ($validator->fails()) {
      return response()->json(
        [
          "code" => 400,
          "msg" => $validator->errors()->first(),
        ],
        400
      );
    }

    $parsed_url = parse_url($r->longurl);
    $blocked_domains = [parse_url(env("APP_URL"), PHP_URL_HOST)];

    $host = $parsed_url["host"] ?? null; //
    if ($host && in_array($host, $blocked_domains)) {
      return response()->json(
        [
          "code" => 400,
          "msg" => "You can't shorten this domain.",
        ],
        400
      );
    }

    //CHECK IF USER SENT CUSTOM SLUG
    if ($r->slug) {
      $links = Link::where("slug", $r->slug)->first();
      if ($links) {
        return response()->json(
          [
            "code" => 400,
            "msg" => "Slug Not Available",
          ],
          400
        );
      } else {
        $slug = $r->slug;
        $link = env("APP_URL") . "/" . $slug;
      }
    } else {
      $slug = $this->generate_random_code();
      $link = env("APP_URL") . "/" . $slug;
    }

    $statics_slug = $this->generate_random_code(8);
    $statics_link = env("APP_URL") . "/statistic/" . $statics_slug;

    $links = new Link();
    $links->url = $r->longurl;
    $links->slug = $slug;
    $links->statics = $statics_slug;
    $links->save();

    return response()->json(
      [
        "code" => 200,
        "link" => $link,
        "statics_link" => $statics_link,
      ],
      200
    );
  }

  public function redirect(Request $r)
  {
    $userIP = $r->ip();
    $row = Link::where("slug", $r->slug)->first();

    if ($row) {
      $ipdata = file_get_contents("https://ipinfo.io/" . $userIP . "/json");
      $ipresult = json_decode($ipdata);
      if (isset($ipresult->country)) {
        $country = $ipresult->country;
      } else {
        $country = null;
      }

      $click = new Click();
      $click->linkid = $row->id;
      $click->ip = $userIP;
      $click->country = $country;

      $click->save();
      return redirect("$row->url");
    } else {
      abort(404);
    }
  }

  public function statistic($code)
  {
    $link = Link::where("statics", $code)->first();
    if (!$link) {
      abort(404);
    }

    $clicks = $link->clicks;
    $clicks_count = count($clicks);

    $topCountries = Click::where("linkid", $link->id)
      ->select("country", DB::raw("count(*) as total"))
      ->groupBy("country")
      ->orderByDesc("total")
      ->limit(5)
      ->get();

    $lastClicks = Click::where("linkid", $link->id)
      ->orderByDesc("created_at")
      ->limit(5)
      ->get();
    
    return view(
      "statistic",
      compact("clicks_count", "topCountries", "lastClicks", "link")
    );
  }
}
