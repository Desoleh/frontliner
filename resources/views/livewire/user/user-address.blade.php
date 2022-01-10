<div>
    <table class="min-w-full">
        <tbody class="bg-white">
            <tr>
                <td class="px-6 py-2 bg-gray-100 border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-600">Alamat</div>
                </td>
                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm font-medium leading-5 text-gray-900">{{ $useraddress->address }}</div>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-2 bg-gray-100 border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-600">Provinsi</div>
                </td>
                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm font-medium leading-5 text-gray-900">{{ $useraddress->provinces_name }}</div>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-2 bg-gray-100 border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-600">Kota/Kabupaten</div>
                </td>
                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm font-medium leading-5 text-gray-900">{{ $useraddress->regencies_name}}</div>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-2 bg-gray-100 border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-600">Kecamatan</div>
                </td>
                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm font-medium leading-5 text-gray-900">{{ $useraddress->districts_name }}</div>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-2 bg-gray-100 border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-600">Desa/Keluarahan</div>
                </td>
                <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm font-medium leading-5 text-gray-900">{{ $useraddress->villages_name }}</div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
