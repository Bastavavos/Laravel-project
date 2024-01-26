<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Business
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $history
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $address
 * @property string $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $zip_code_id
 * @property string $city_id
 * @property string $theme_id
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $owner
 * @property-read int|null $owner_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Speciality> $speciality
 * @property-read int|null $speciality_count
 * @property-read \App\Models\Theme|null $theme
 * @property-read \App\Models\ZipCode|null $zipCode
 * @method static \Database\Factories\BusinessFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Business newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Business newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Business query()
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereThemeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Business whereZipCodeId($value)
 * @mixin \Eloquent
 */
	class IdeHelperBusiness {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property string $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $product
 * @property-read int|null $product_count
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @mixin \Eloquent
 */
	class IdeHelperCategory {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property string $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Business> $business
 * @property-read int|null $business_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $user
 * @property-read int|null $user_count
 * @method static \Database\Factories\CityFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @mixin \Eloquent
 */
	class IdeHelperCity {}
}

namespace App\Models{
/**
 * App\Models\Color
 *
 * @property string $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $product
 * @property-read int|null $product_count
 * @method static \Database\Factories\ColorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereName($value)
 * @mixin \Eloquent
 */
	class IdeHelperColor {}
}

namespace App\Models{
/**
 * App\Models\Invoice
 *
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $customer_id
 * @property-read \App\Models\User $customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $product
 * @property-read int|null $product_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Status> $status
 * @property-read int|null $status_count
 * @method static \Database\Factories\InvoiceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperInvoice {}
}

namespace App\Models{
/**
 * App\Models\Material
 *
 * @property string $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $product
 * @property-read int|null $product_count
 * @method static \Database\Factories\MaterialFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Material newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Material newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Material query()
 * @method static \Illuminate\Database\Eloquent\Builder|Material whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Material whereName($value)
 * @mixin \Eloquent
 */
	class IdeHelperMaterial {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property int $stock
 * @property string $image
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $business_id
 * @property string $category_id
 * @property string $material_id
 * @property string $style_id
 * @property string $color_id
 * @property string $size_id
 * @property-read \App\Models\Business|null $business
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Color|null $color
 * @property-read \App\Models\Material|null $material
 * @property-read \App\Models\Size|null $size
 * @property-read \App\Models\Style|null $style
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMaterialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStyleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperProduct {}
}

namespace App\Models{
/**
 * App\Models\Size
 *
 * @property string $id
 * @property float $height
 * @property float $width
 * @property float $depth
 * @property float $capacity
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $product
 * @property-read int|null $product_count
 * @method static \Database\Factories\SizeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Size newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size query()
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereWidth($value)
 * @mixin \Eloquent
 */
	class IdeHelperSize {}
}

namespace App\Models{
/**
 * App\Models\Speciality
 *
 * @property string $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Business> $business
 * @property-read int|null $business_count
 * @method static \Database\Factories\SpecialityFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Speciality newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Speciality newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Speciality query()
 * @method static \Illuminate\Database\Eloquent\Builder|Speciality whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speciality whereName($value)
 * @mixin \Eloquent
 */
	class IdeHelperSpeciality {}
}

namespace App\Models{
/**
 * App\Models\Status
 *
 * @property string $id
 * @property string $name
 * @property int $number
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Invoice> $invoices
 * @property-read int|null $invoices_count
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereNumber($value)
 * @mixin \Eloquent
 */
	class IdeHelperStatus {}
}

namespace App\Models{
/**
 * App\Models\Style
 *
 * @property string $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $product
 * @property-read int|null $product_count
 * @method static \Database\Factories\StyleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Style newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Style newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Style query()
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereName($value)
 * @mixin \Eloquent
 */
	class IdeHelperStyle {}
}

namespace App\Models{
/**
 * App\Models\Theme
 *
 * @property string $id
 * @property string $layer
 * @property string $color_1
 * @property string $color_2
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Business> $business
 * @property-read int|null $business_count
 * @method static \Database\Factories\ThemeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereColor1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereColor2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereLayer($value)
 * @mixin \Eloquent
 */
	class IdeHelperTheme {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string $address
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $zip_code_id
 * @property string $city_id
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\ZipCode|null $zipCode
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereZipCodeId($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * App\Models\ZipCode
 *
 * @property string $id
 * @property int|null $value
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Business> $business
 * @property-read int|null $business_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $user
 * @property-read int|null $user_count
 * @method static \Database\Factories\ZipCodeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ZipCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZipCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZipCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZipCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZipCode whereValue($value)
 * @mixin \Eloquent
 */
	class IdeHelperZipCode {}
}

