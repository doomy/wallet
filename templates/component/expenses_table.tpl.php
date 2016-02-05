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
    </tr>

    <<<foreach|$expenses|$expense>>>
		<tr>
			<td>$$expense->description$$</td>
			<td>$$expense->amount$$</td>
			<td>$$expense->date_added$$</td>
		</tr>
	<<</foreach>>>
</table>