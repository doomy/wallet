<table border="1">
    <tr>
        <th>
            Operation description
        </th>
        <th>
            Amount
        </th>
		<th>
			Date added
		</th>
		<th>
			Necessary
		</th>
    </tr>

    <<<foreach|$operations|$operation>>>
		<tr>
			<td>$$operation->description$$</td>
			<td>$$operation->amount$$</td>
			<td>$$operation->date_added$$</td>
			<td>$$operation->mandatory$$</td>
		</tr>
	<<</foreach>>>
</table>