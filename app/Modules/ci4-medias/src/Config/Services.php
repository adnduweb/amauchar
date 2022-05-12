<?php namespace Amauchar\Medias\Config;

use CodeIgniter\Model;
use Amauchar\Medias\Config\Media as MediaConfig;
use Amauchar\Medias\Media;

use Amauchar\Medias\Config\ImageManger as ImageMangerConfig;
use Amauchar\Medias\Libraries\BaseImageManger;

use Config\Services as BaseService;

class Services extends BaseService
{
  
	/**
	 * Return List Theme.
	 *
	 * @param Media|null $config
	 * @param bool      $getShared
	 *
	 * @return ResetterInterface
	 */
	public static function media(Media $config = null, bool $getShared = true): Media
	{
		if ($getShared)
		{
			return self::getSharedInstance('media', $config);
		}

		return new Media($config ?? config('Media'));
	}

		/**
	 * Returns an instance of the ImageManger library
	 * using the specified configuration.
	 *
	 * @param ImageMangerConfig|null $config
	 * @param boolean               $getShared
	 *
	 * @return ImageManger
	 */
	public static function imageManger(ImageMangerConfig $config = null, bool $getShared = true) : BaseImageManger
	{
		if ($getShared)
		{
			return static::getSharedInstance('imageManger', $config);
		}

		return new BaseImageManger($config ?? config('ImageManger'));
	}

	
}