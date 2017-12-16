<?php

namespace yii2lab\qr\domain\widgets;

use Yii;
use yii\base\Widget;

class Qr extends Widget
{

	const TYPE_IMG = 'img';
	const TYPE_TABLE = 'table';

	public $type = self::TYPE_IMG;
	public $size = 5;
	public $margin = 1;
	public $text;

	public function run()
	{
		$qr = Yii::$app->qr->generator->generate($this->text);
		$this->type = !empty($this->type) ? $this->type : self::TYPE_IMG;
		echo $this->render($this->type, [
			'url' => $qr->url,
			'matrix' => $qr->matrix,
			'size' => $this->size,
			'margin' => $this->margin,
		]);
	}

}
