<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donor;

class DonorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

        return view('Donors.create');

    }

    public function store()
    {
        $organizations = implode(',',$_POST['member']);

        $objDonorModel = new Donor();

        $objDonorModel->name = $_POST['name'];
        $objDonorModel->mobile = $_POST['mobile'];
        $objDonorModel->bloodGroup = $_POST['bloodGroup'];
        $objDonorModel->gender = $_POST['gender'];
        $objDonorModel->location = $_POST['location'];
        $objDonorModel->lastDonationDate = $_POST['lastDonationDate'];
        $objDonorModel->member = $organizations;
        $objDonorModel->summary = $_POST['summary'];

        $objDonorModel->save();

        return redirect('donors/index')->with('status', 'Donor has been added successfully!');

    }

    public function index()
    {
        $allDonors = (new Donor())->orderBy('id', 'desc')->paginate(4);

        return view('Donors.donors_info', compact('allDonors'));
    }

    public function delete($id)
    {
        (new Donor())->find($id)->delete();

        return redirect('donors/index')->with('status', 'Deleted Successfully!');

    }

    public function edit($id)
    {
        $donor = (new Donor())->find($id);

        $organizationArray = explode(',', $donor->member);

        return view('Donors.edit', compact('donor', 'organizationArray'));
    }

    public function update()
    {
        $organizations = implode(',',$_POST['member']);

        $donor = (new Donor())->find($_POST['id']);

        $donor->name = $_POST['name'];
        $donor->mobile = $_POST['mobile'];
        $donor->bloodGroup = $_POST['bloodGroup'];
        $donor->gender = $_POST['gender'];
        $donor->location = $_POST['location'];
        $donor->lastDonationDate = $_POST['lastDonationDate'];
        $donor->member = $organizations;
        $donor->summary = $_POST['summary'];

        $donor->update();

        return redirect('donors/index')->with('status', 'Updated Successfully!');

    }

    public function search($keyword)
    {
        $searchData = (new Donor())
            ->where("name","LIKE","%$keyword%")
            ->orwhere("location","LIKE","%$keyword%")
            ->orwhere("bloodGroup","LIKE","%$keyword%")
            ->paginate(2);

        return view('Donors.search', compact('searchData'));
    }
}
