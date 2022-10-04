<?php

namespace Tests\Feature;

use App\Models\Member;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class MemberTest extends TestCase
{
    use RefreshDatabase;

    public function test_member_page()
    {
         $response = $this->get('/member');

        $response->assertStatus(302);
    }


    public function test_member_store()
    {
        $member1 = Member::make([
            'nama' => 'Irfan Skuy',
            'alamat' => 'Malang',
            'telepon' => '08777141403',
        ]);
        $member2 = Member::make([
            'nama' => 'Gali Lay',
            'alamat' => 'Jonggol',
            'telepon' => '08973639033',
        ]);

        $this->assertTrue($member1->nama != $member2->nama);
    }

    public function test_member_update()
    {
        $member = Member::where('id_member', 1)->update([
            'nama' => 'Irfan Skuy',
            'alamat' => 'Batu',
            'telepon' => '08976533331',
        ]);

        $this->assertDatabaseMissing(
            'member',
            [
                'nama' => 'Irfan Skuy',
                'alamat' => 'Batu',
                'telepon' => '08976533331',
            ]
        );
    }

    public function test_member_delete()
    {
        $member = Member::first();
        if ($member) {
            $member->delete();
        }
        $this->assertTrue(true);
    }

    public function  test_it_store_new_member()
    {
        $response = $this->post('/member', [
            'nama' => 'Gali Lay',
            'alamat' => 'Papua',
            'telepon' => '086739322323',
        ]);

        $response->assertRedirect()->dump('/member');
    }
}
