<?php namespace Application\Missions\Admin\Api;

use Application\Entity\Content;
use Application\Entity\User;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Carbon\Entity;
use Atomino\Gold\Gold;
use Atomino\Gold\Goldify;
use Atomino\Gold\ItemApi;
use Atomino\Gold\ListApi;
use Atomino\Gold\ListSorting;
use Atomino\Gold\ListView;

#[Goldify(Content::class, User::ROLE_WEBMASTER)]
class ContentApi extends Gold
{
    protected function listApi(): ListApi
    {
        return new class($this, 10, false) extends ListApi {
            public function views(): array
            {
                return [
                    new ListView("Everybody", fn() => null),
                ];
            }

            public function sortings(): array
            {
                return [
                    new ListSorting("name", fn($asc) => $asc ? [[Content::name, "asc"]] : [[Content::name, "desc"]]),
                ];
            }

            public function export(Entity $item): array
            {
                return parent::export($item);
            }

            public function searchFilter(array $filter): Filter|null
            {
                return Filter::where(isset($filter['name']) && $filter['name'] ? Content::name()->instring($filter['name']) : null);
            }

            public function quickSearchFilter(string $search): Filter
            {
                return Filter::where(Content::name()->instring($search))
                    ->or(Content::id($search));
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
          protected function export(Entity|Content $item): array
          {
              return parent::export($item);
          }
          protected function update(Entity|Content $item, array $data): int|null
          {
              return parent::update($item, $data);
          }
        };
    }
}
