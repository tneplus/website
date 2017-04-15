<?php
// Copyright 2017 mkuba50

// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at

//    http://www.apache.org/licenses/LICENSE-2.0

// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en-us';
require 'lang/core.php';
require 'shared/style.php';

$out = @file_get_contents('dump.json');
if(empty($out)) {
    $out = array('genTime' => null, 'productNumber' => '?', 'products' => null);
} else {
    $out = json_decode($out, true);
}

styleTop('home');

echo '<h1>'.$translation['tbDump'].' <span class="badge">v'.$websiteVersion.'</span></h1>';
?>

<div class="alert alert-info" style="margin-top: 1.5em">
    <h4><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> <?php echo $translation['techInfo']; ?></h4>
    <p> <?php echo $translation['lastUpdate']; ?>: <b><?php echo date("Y-m-d H:i:s T", $out['genTime']); ?></b><br>
     <?php echo $translation['productsNumber']; ?>: <b><?php echo $out['productNumber']; ?></b></p>
</div>

<div class="well">
    <form action="./products.php">
        <div class="input-group">
            <input type="text" class="form-control input-lg" name="search" placeholder="<?php echo $translation['searchBar'];?>">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-lg">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
        <div class="row" style="margin-top: 0.5em;">
            <div class="col-md-12">
                <label class="radio-inline">
                    <input type="radio" name="prod" value="all" checked> <?php echo $translation['allProd'];?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="radio-inline">
                    <input type="radio" name="prod" value="win7"> <?php echo $translation['win7'];?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="radio-inline">
                    <input type="radio" name="prod" value="win81"> <?php echo $translation['win81'];?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="radio-inline">
                    <input type="radio" name="prod" value="win10"> <?php echo $translation['win10'];?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="radio-inline">
                    <input type="radio" name="prod" value="office2007"> <?php echo $translation['office2007'];?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="radio-inline">
                    <input type="radio" name="prod" value="office2010"> <?php echo $translation['office2010'];?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="radio-inline">
                    <input type="radio" name="prod" value="office2011"> <?php echo $translation['office2011'];?>
                </label>
            </div>
        </div>
        <input type="hidden" name="lang" value="<?php echo $translation['langCode']; ?>">
    </form>
</div>

<div class="row" style="margin-top: -1.25em;">
    <div class="col-md-6 prod-btn"><a class="btn btn-primary btn-lg btn-block" href="./products.php?prod=win7&amp;<?php echo $langParam;?>">
        <div class="prod-btn-title"><?php echo $translation['win7'];?></div>
        <div class="prod-btn-desc"><?php echo $translation['win7_desc'];?></div>
    </a></div>
    <div class="col-md-6 prod-btn"><a class="btn btn-primary btn-lg btn-block" href="./products.php?prod=win81&amp;<?php echo $langParam;?>">
        <div class="prod-btn-title"><?php echo $translation['win81'];?></div>
        <div class="prod-btn-desc"><?php echo $translation['win81_desc'];?></div>
    </a></div>
</div>

<div class="row">
    <div class="col-md-6 prod-btn">
        <button class="btn btn-primary btn-block btn-lg dropdown-toggle dropd-toggle-btn" data-toggle="dropdown">
            <div class="prod-btn-title"><?php echo $translation['win10'];?></div>
            <div class="prod-btn-desc"><?php echo $translation['win10_desc'];?></div>
            <span class="caret dropd-icon"></span>
        </button>
        <ul class="dropdown-menu dropd-menu-right">
            <li><a href="./products.php?prod=win10&amp;<?php echo $langParam;?>"><?php echo $translation['win10'];?></a></li>
            <li role="separator" class="divider"></li>
            <li><a href="./products.php?prod=win10th1&amp;<?php echo $langParam;?>"><?php echo $translation['win10th1'];?></a></li>
            <li><a href="./products.php?prod=win10th2&amp;<?php echo $langParam;?>"><?php echo $translation['win10th2'];?></a></li>
            <li><a href="./products.php?prod=win10rs1&amp;<?php echo $langParam;?>"><?php echo $translation['win10rs1'];?></a></li> <!-- Windows 10 Redmond 1 -->
            <li><a href="./products.php?prod=win10rs2&amp;<?php echo $langParam;?>"><?php echo $translation['win10rs2'];?></a></li> <!-- Windows 10 Redmond 2 -->
            <li><a href="./products.php?prod=win10ip&amp;<?php echo $langParam;?>"><?php echo $translation['win10ip'];?></a></li>
        </ul>
    </div>
    <div class="col-md-6 prod-btn"><a class="btn btn-primary btn-lg btn-block" href="./products.php?prod=office2007&amp;<?php echo $langParam;?>">
        <div class="prod-btn-title"><?php echo $translation['office2007'];?></div>
        <div class="prod-btn-desc"><?php echo $translation['office2007_desc'];?></div>
    </a></div>
</div>

<div class="row">
    <div class="col-md-6 prod-btn"><a class="btn btn-primary btn-lg btn-block" href="./products.php?prod=office2010&amp;<?php echo $langParam;?>">
        <div class="prod-btn-title"><?php echo $translation['office2010'];?></div>
        <div class="prod-btn-desc"><?php echo $translation['office2010_desc'];?></div>
    </a></div>
    <div class="col-md-6 prod-btn"><a class="btn btn-primary btn-lg btn-block" href="./products.php?prod=office2011&amp;<?php echo $langParam;?>">
        <div class="prod-btn-title"><?php echo $translation['office2011'];?></div>
        <div class="prod-btn-desc"><?php echo $translation['office2011_desc'];?></div>
    </a></div>
</div>

<hr>

<div class="row" style="margin-top: -1.25em;">
    <div class="col-md-6 prod-btn"><a class="btn btn-default btn-lg btn-block" href="./products.php?prod=all&amp;<?php echo $langParam;?>">
        <div class="prod-btn-title"><?php echo $translation['allProd'];?></div>
        <div class="prod-btn-desc"><?php echo $translation['allProd_desc'];?></div>
    </a></div>
    <div class="col-md-6 prod-btn"><a class="btn btn-default btn-lg btn-block" href="./products.php?prod=other&amp;<?php echo $langParam;?>">
        <div class="prod-btn-title"><?php echo $translation['otherProd'];?></div>
        <div class="prod-btn-desc"><?php echo $translation['otherProd_desc'];?></div>
    </a></div>
</div>

<?php styleBottom(); ?>
