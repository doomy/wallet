<table border="1">
    <tr>
        <th>
            Expense description
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

    <<<foreach|$expenses|$expense>>>
		<tr>
			<td>$$expense->description$$</td>
			<td>$$expense->amount$$</td>
			<td>$$expense->date_added$$</td>
			<td>$$expense->mandatory$$</td>
		</tr>
	<<</foreach>>>
</table>