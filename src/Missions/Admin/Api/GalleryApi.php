<?php namespace Application\Missions\Admin\Api;

use Application\Entity\Gallery;
use Application\Entity\User;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Carbon\Entity;
use Atomino\Gold\AttachmentApi;
use Atomino\Gold\Gold;
use Atomino\Gold\Goldify;
use Atomino\Gold\ItemApi;
use Atomino\Gold\ListApi;
use Atomino\Gold\ListSorting;
use Atomino\Gold\ListView;

#[Goldify(Gallery::class, User::ROLE_MARKETING)]
class GalleryApi extends Gold{
    protected function listApi(): ListApi
    {
        return new class($this, 10, false) extends ListApi {
            public function views(): array
            {
                return [
                    new ListView("All", fn() => null),
                    new ListView("Active", fn() => Filter::where(Gallery::active(true))),
                    new ListView("Inactive", fn() => Filter::where(Gallery::active(false|null))),
                    new ListView("Press Photos", fn() => Filter::where(Gallery::category("sajtofotok"))),
                    new ListView("Presentation", fn() => Filter::where(Gallery::category("eloadas"))),
                    new ListView("Exhibition", fn() => Filter::where(Gallery::category("kiallitas"))),
                    new ListView("Dinner", fn() => Filter::where(Gallery::category("fogadas"))),
                    new ListView("Event", fn() => Filter::where(Gallery::category("esemeny"))),
                ];
            }

            public function sortings(): array
            {
                return [
                    new ListSorting("name", fn($asc) => $asc ? [[Gallery::hu_title, "asc"]] : [[Gallery::hu_title, "desc"]]),
                    new ListSorting("year", fn($asc) => $asc ? [[Gallery::year, "asc"]] : [[Gallery::year, "desc"]]),
                ];
            }

            public function export(Entity|Gallery $item): array
            {
                $data = parent::export($item);
                $data['picture'] = $item->picture->first?->image->crop(64,64)->png;
                return $data;
            }

            public function searchFilter(array $filter): Filter|null
            {
                return Filter::where(isset($filter['hu_title']) && $filter['hu_title'] ? Gallery::hu_title()->instring($filter['hu_title']) : null);
            }

            public function quickSearchFilter(string $search): Filter
            {
                return Filter::where(Gallery::hu_title()->instring($search))
                    ->or(Gallery::id($search));
            }
        };
    }

    protected function itemApi(): ItemApi
    {
        return new class($this) extends ItemApi {
            protected function options(Entity|null $item): array|null
            {
                return null;
            }
            protected function export(Entity|Gallery $item): array
            {
               return parent::export($item);
            }
            protected function update(Entity|Gallery $item, array $data): int|null
            {
                return parent::update($item, $data);
            }
        };
    }
}
